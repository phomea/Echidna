<?php
namespace core;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

class Data{
    static $data = [
        "live"  =>  [

            "hochiminh-pistoia-14-01-2018" => [
                'introduzione'=>'Il primo live del 2018 mi ha visto alle prese con un set semi-acustico molto aggressivo. All\'HoChiMinh ci ero già passato molte
                            volte con vari progetti musicali, ma questa prima di <b>phomea 2018</b> è stata emozionante.
                            <br>
                            Prima del concerto ci siamo soffermati un pò tutti sulla casa di fronte... karaoke, finestra aperta, cassa da almeno 14kw, Celine Dion come se piovesse e balli cinese mi hanno quasi spinto ad unirmi agli intrepidi vicini e lasciar perdere il mio live, ma alla fine è andata come doveva andare!

                            <blockquote>Qui sotto trovate qualche video e foto della serata! bye bye</blockquote>',
                "video" =>  ["W5HZq3rUyQw","W5HZq3rUyQw"],
                "foto"  =>  [
                    [
                        "class" => "grid-item",
                        "src"   => "/media/live/hochiminh-14-01-2018/26757119_10156133715288793_5564241753736151015_o.jpg"
                    ],
                    [
                        "class" => "grid-item grid-item--width2",
                        "src"   => "/media/live/hochiminh-14-01-2018/IMG_20180114_212542750_HDR.jpg"
                    ],
                    [
                        "class" => "grid-item",
                        "src"   => "/media/live/hochiminh-14-01-2018/IMG_20180114_212553555_HDR.jpg"
                    ],
                    [
                        "class" => "grid-item grid-item--width2",
                        "src"   => "/media/live/hochiminh-14-01-2018/IMG_20180114_222555607_HDR.jpg"
                    ]
                ]
            ],
            "lo-spazio-di-via-dell-ospizio-25-01-2018" => [
                'introduzione'=>'Il primo live del 2018 mi ha visto alle prese con un set semi-acustico molto aggressivo. All\'HoChiMinh ci ero già passato molte
                            volte con vari progetti musicali, ma questa prima di <b>phomea 2018</b> è stata emozionante.
                            <br>
                            Prima del concerto ci siamo soffermati un pò tutti sulla casa di fronte... karaoke, finestra aperta, cassa da almeno 14kw, Celine Dion come se piovesse e balli cinese mi hanno quasi spinto ad unirmi agli intrepidi vicini e lasciar perdere il mio live, ma alla fine è andata come doveva andare!

                            <blockquote>Qui sotto trovate qualche video e foto della serata! bye bye</blockquote>',
                "video" =>  ["loygro3JrE8","n67bc9YP1-E"],
                "foto"  =>  [
                    [
                        "class" => "grid-item",
                        "src"   => "/media/live/lospaziodiviadellospizio-25-01-2018/455ab955-fe0f-4aa5-b5c5-58dd635732c8.jpg"
                    ],
                    [
                        "class" => "grid-item",
                        "src"   => "/media/live/lospaziodiviadellospizio-25-01-2018/de5d6be6-c229-45fd-8d3b-bb7cc5c975d4.jpg"
                    ],
                    [
                        "class" => "grid-item grid-item--width2",
                        "src"   => "/media/live/lospaziodiviadellospizio-25-01-2018/fa2fe7d0-1663-4ccc-85fe-e70ffcc49deb.jpg"
                    ]
                ]
            ]
        ]
    ];
    static function get($type, $key){

        if( isset(self::$data[$type]) && isset(self::$data[$type][$key]) ) {
            return self::$data[$type][$key];
        }else{
            throw new HttpRouteNotFoundException();
        }
        exit;
    }
}