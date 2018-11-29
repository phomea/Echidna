<?php
namespace applications\main;

class ServerStats {



    static function shapeSpace_system_load($coreCount = 2, $interval = null ) {
        if( $interval == null ){
            return sys_getloadavg();
        }
        $rs = sys_getloadavg();
        $interval = $interval >= 1 && 3 <= $interval ? $interval : 1;
        $load = $rs[$interval];
        return round(($load * 100) / $coreCount,2);
    }

    static function shapeSpace_system_cores() {

        $cmd = "uname";
        $OS = strtolower(trim(shell_exec($cmd)));

        switch($OS) {
            case('linux'):
                $cmd = "cat /proc/cpuinfo | grep processor | wc -l";
                break;
            case('freebsd'):
                $cmd = "sysctl -a | grep 'hw.ncpu' | cut -d ':' -f2";
                break;
            default:
                unset($cmd);
        }

        if ($cmd != '') {
            $cpuCoreNo = intval(trim(shell_exec($cmd)));
        }

        return empty($cpuCoreNo) ? 1 : $cpuCoreNo;

    }
    static function getTotalam(){
        $r = self::getSystemMemInfo();


        return trim(str_replace("kB","",$r["MemTotal"]));
    }static function getFreeRam(){
        $r = self::getSystemMemInfo();


        return trim(str_replace("kB","",$r["MemFree"]));
    }
    static function getSystemMemInfo()
    {
        $data = explode("\n", trim(file_get_contents("/proc/meminfo")));
        $meminfo = array();
        foreach ($data as $line) {
            list($key, $val) = explode(":", $line);
            $meminfo[$key] = trim($val);
        }
        return $meminfo;
    }

    static function shapeSpace_http_connections() {

        if (function_exists('exec')) {

            $www_total_count = 0;
            @exec ('netstat -an | egrep \':80|:443\' | awk \'{print $5}\' | grep -v \':::\*\' |  grep -v \'0.0.0.0\'', $results);

            foreach ($results as $result) {
                $array = explode(':', $result);
                $www_total_count ++;

                if (preg_match('/^::/', $result)) {
                    $ipaddr = $array[3];
                } else {
                    $ipaddr = $array[0];
                }

                if (!in_array($ipaddr, $unique)) {
                    $unique[] = $ipaddr;
                    $www_unique_count ++;
                }
            }

            unset ($results);

            return count($unique);

        }

    }

    static function shapeSpace_server_memory_usage() {

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2] / $mem[1] * 100;

        return $memory_usage;

    }

    static function diskInfo() {

        $disktotal = disk_total_space ('/');
        $diskfree  = disk_free_space  ('/');
        $diskuse   = round (100 - (($diskfree / $disktotal) * 100)) .'%';

        return [
            "total" =>  $disktotal,
            "free"  =>  $diskfree,
            "used"  =>  $diskuse
        ];

    }

    static function shapeSpace_server_uptime() {

        $uptime = floor(preg_replace ('/\.[0-9]+/', '', file_get_contents('/proc/uptime')) / 86400);

        return $uptime;

    }
}