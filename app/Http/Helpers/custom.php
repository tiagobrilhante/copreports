<?php

if (!function_exists('guid')) {
    function guid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}

if (!function_exists('tamanhoArquivo')) {
    function tamanhoArquivo($tamanho)
    {
        if ($tamanho >= 1048576) {
            $tamanho = number_format($tamanho / 1048576, 2) . ' GB';
        } else if ($tamanho >= 1024) {
            $tamanho = number_format($tamanho / 1024, 2) . ' MB';
        } else {
            $tamanho = $tamanho . ' KB';
        }

        return $tamanho;
    }
}

if (!function_exists('dataDeHoje')) {
    function dataDeHoje()
    {
        $data = date('Y-m-d');
        return $data;
    }
}

if (!function_exists('contatempo')) {
    function contatempo($data_inicial, $data_final)
    {

        // Usa a função strtotime() e pega o timestamp das duas datas:
        $time_inicial = strtotime($data_inicial);
        $time_final = strtotime($data_final);
        // Calcula a diferença de segundos entre as duas datas:
        $diferenca = $time_final - $time_inicial; // 19522800 segundos
        // Calcula a diferença de dias
        $dias = (int)floor($diferenca / (60 * 60 * 24)); // 225 dias
        // retorna o resultado:

        return abs($dias);
    }
}

if (!function_exists('corAleatoria')) {
    function corAleatoria()
    {
        $cores = [
            "#FFFFFF", "#CCCCCC", "#999999", "#666666", "#333333", "#000000", "#003366", "#336699", "#3366CC", "#003399", "#000099", "#0000CC",
            "#000066", "#006666", "#006699", "#0099CC", "#0066CC", "#0033CC", "#0000FF", "#3333FF", "#333399", "#669999", "#009999", "#33CCCC",
            "#00CCFF", "#0099FF", "#0066FF", "#3366FF", "#3333CC", "#666699", "#666699", "#339966", "#00CC99", "#00FFCC", "#00FFFF", "#33CCFF",
            "#3399FF", "#6699FF", "#6666FF", "#6600FF", "#6600CC", "#339933", "#00CC66", "#00FF99", "#66FFCC", "#66FFFF", "#66CCFF", "#99CCFF",
            "#9999FF", "#9966FF", "#9933FF", "#9900FF", "#006600", "#00CC00", "#00FF00", "#66FF99", "#99FFCC", "#CCFFFF", "#CCCCFF", "#CC99FF",
            "#CC66FF", "#CC33FF", "#CC00FF", "#9900CC", "#003300", "#009933", "#33CC33", "#66FF66", "#99FF99", "#CCFFCC", "#FFFFFF", "#FFCCFF",
            "#FF99FF", "#FF66FF", "#FF00FF", "#CC00CC", "#660066", "#336600", "#009900", "#66FF33", "#99FF66", "#CCFF99", "#FFFFCC", "#FFCCCC",
            "#FF99CC", "#FF66CC", "#FF33CC", "#CC0099", "#993399", "#333300", "#669900", "#99FF33", "#CCFF66", "#FFFF99", "#FFCC99", "#FF9999",
            "#FF6699", "#FF3399", "#CC3399", "#990099", "#666633", "#99CC00", "#CCFF33", "#FFFF66", "#FFCC66", "#FF9966", "#FF6666", "#FF0066",
            "#CC6699", "#993366", "#999966", "#CCCC00", "#FFFF00", "#FFCC00", "#FF9933", "#FF6600", "#FF5555", "#CC0066", "#660033", "#996633",
            "#CC9900", "#FF9900", "#CC6600", "#FF3300", "#FF0000", "#CC0000", "#990033", "#663300", "#996600", "#CC3300", "#993300", "#990000",
            "#880000", "#993333", "#6699CC", "#333366", "#000033", "#99FFFF", "#00CCCC", "#66CCCC", "#99CCCC", "#66CC99", "#99CC66", "#99CC99",
            "#66CC66", "#33CC66", "#33FF66", "#339900", "#669966", "#336633", "#009966", "#33CC00", "#66CC00", "#CCFF00", "#CCCC99", "#CCCC66",
            "#999900", "#666600", "#CC9966", "#330000", "#CC6633", "#CC9933", "#CC0033", "#CC6666", "#CC9999", "#996666", "#663333", "#660000",
            "#990066", "#FF0099", "#FF33FF", "#CC66CC", "#CC33CC", "#663366", "#996699", "#CC99CC", "#9999CC", "#6633CC", "#6666CC", "#9966CC",
            "#9933CC", "#663399", "#330066", "#660099", "#330033"
        ];

        return $cores[rand(0, (count($cores) - 1))];
    }
}

