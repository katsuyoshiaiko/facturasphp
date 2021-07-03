<?php
/**
 * Entrega la lista de dias feriados 
 * @param type $year
 * @return array
 */
function magia_dates_holidays_belgium($year = null) {
    
    $dates = array();
    
    foreach (holidays_list() as $key => $value) {
        array_push($dates, $value['date']);
    }

    return $dates;
}


function magia_dates_formated($date, $format = "") {
    $date = substr($date, 0, 10);
    $new_date = date('Y-M-d', strtotime($date . "+0 day"));
    return $new_date;
}

function magia_dates_add_day($date, $day) {
    /**
     * 
      $stop_date = '2009-09-30 20:24:00';
      echo 'date before day adding: ' . $stop_date;
      $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
      echo 'date after adding 1 day: ' . $stop_date;
     */
    $new_date = date('Y-m-d H:i:s', strtotime($date . "+$day day"));
    return $new_date;
}

/**
 * A una fecha le sumo dias: 
 * Laborables y no feriados 
 * @param type $date
 * @param type $nDays
 * @return type
 */
function magia_add_only_n_working_days($date, $nDays) {
    
    $new_date = $date;
    $cpt = 0;
    $i = 1;

    while ($cpt < $nDays) {

        if (
                date('w', strtotime($date . "+$i day")) != 0 &&
                date('w', strtotime($date . "+$i day")) != 6 &&
                !in_array(date('Y-m-d', strtotime($date . "+$i day")), magia_dates_holidays_belgium(date('Y')))
        ) {
            $new_date = date('Y-m-d H:i:s', strtotime($date . "+$i day"));
            $cpt++;
        }

        $i++;
    }

    return $new_date;





//    // Ejemplo: a jueves agregar dias
//    // j + 4 = v s d l        Aca se suma s y d ERROR
//    // j + 4 = v x x l m m    Aca se salta s y d OKKKKKK
//    // start debe ser inferior o igual a end
//    // start y end debe ser de formato correcto 
//    // Saco los n dias entre las dos fechas     
//    $new_date = magia_dates_add_day($date, $nDays);
//
//    $i=0; 
//    while ($i <= $nDays) {
//        
//        $day = date('D', strtotime($date)); 
//        $Y = date('Y', strtotime($date)); 
//        
//        if( ($day != "Sat" && $day != "Sun") && ! in_array($date, magia_holidays_belgium($Y)) ){
//            $new_date = magia_dates_add_day($date, 1); 
//            echo $i .  "<br>"; 
//            $i++;             
//        }
//    }
//    
//    
//    
//    return $day;
}

/**
 * Diferencia entre dos fechas
 * @param type $date_start Fecha de inico 
 * @param type $date_end fecha de fin
 * @return type dias de diferencia
 */
function magia_dates_day_between($date_start, $date_end) {
    $start  = strtotime($date_start . "+0 day");
    $end    = strtotime($date_end . "+0 day");
    $res    = $end - $start;
    return $res;
}

function magia_dates_month($m) {
    $m = abs($m);
    if ($m > 12 || $m < 1 || !is_int($m)) {
        return null;
    }
    $months = array(
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December");

    if ($m) {
        return $months[$m];
    } else {
        return null;
    }
}

function magia_dates_get_year_from_date($date) {
    if (!$date) {
        return false;
    }
    $Y = date('Y', strtotime($date));
    return $Y;
}

function magia_dates_get_day_from_date($date) {
    if (!$date) {
        return false;
    }
    $w = date('w', strtotime($date));
    return $w;
}

function magia_dates_get_month_from_date($date) {
    if (!$date) {
        return false;
    }
    $m = date('m', strtotime($date));
    return $m;
}
