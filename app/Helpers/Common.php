<?php
function dayOfWeekJp($day)
{
    $convertDayOfWeekJp = '';
    switch ($day) {
        case 'Monday':
            $convertDayOfWeekJp = '月';
            break;
        case 'Tuesday':
            $convertDayOfWeekJp = '火';
            break;
        case 'Wednesday':
            $convertDayOfWeekJp = '水';
            break;
        case 'Thursday':
            $convertDayOfWeekJp = '木';
            break;
        case 'Friday':
            $convertDayOfWeekJp = '金';
            break;
        case 'Saturday':
            $convertDayOfWeekJp = '土';
            break;
        case 'Sunday':
            $convertDayOfWeekJp = '日';
            break;
        default:
            break;
    }
    return $convertDayOfWeekJp;
}
