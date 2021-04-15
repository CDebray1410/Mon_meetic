<?php

class SearchManager extends MainManager
{
    public function searchAccount($gender, $city, $hobbies, $age)
    {
        $db = $this->connectDb();
        $getMembersRequest = 'SELECT * FROM members WHERE 1=1';

        if ($gender != "null") {
            $getMembersRequest .= ' AND gender ="' . htmlspecialchars($gender) . '"';
        }

        if ($city != "" || $city != null) {
            $city_array = explode(", ", $city);
            for ( $i = 0; $i < count($city_array); $i++) {
                if ($i == 0) {
                    $getMembersRequest .= ' AND city ="' . $city_array[$i] . '"';
                } else {
                    $getMembersRequest .= ' OR city ="' . $city_array[$i] . '"';
                }
            }
        }

        if ($hobbies != null) {       
            for ($i = 0; $i < count($hobbies); $i++) {
                if ($i == 0) {
                    $getMembersRequest .= ' AND hobbies LIKE "%' . $hobbies[$i] . '%"';
                } else {
                    $getMembersRequest .= ' OR hobbies LIKE "%' . $hobbies[$i] . '%"';
                }
            }
        }

        if ($age != "null") {
            switch ($age) {
            case '45':
                $getMembersRequest .= ' AND member_age > "' . $age . '"';
                break;
            default :
                $age_array = explode("/", $age);
                $getMembersRequest .= ' AND member_age BETWEEN ' . $age_array[0] . ' AND ' . $age_array[1];
                break;
            } 
        }
        $getMembers = $db->query($getMembersRequest);
        return $getMembers;
    }
}