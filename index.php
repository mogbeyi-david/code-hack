<?php
$people = '{"data":[{"first_name":"jake","last_name":"bennett","age":31,"email":"jake@bennett.com","secret":"VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM="},{"first_name":"jordon","last_name":"brill","age":85,"email": "jordon@brill.com","secret":"YWxidXF1ZXJxdWUuIHNub3JrZWwu"}]}';
/**
 * Instructions:
 *
 * Given the above JSON, build a simple PHP script to import it.
 *
 * Your script should create two variables:
 *
 * - a comma-separated list of email addresses
 * - the original data, sorted by age descending, with a new field on each record
 *   called "name" which is the first and last name joined.
 *
 * Please deliver your code in either a GitHub Gist or some other sort of web-hosted code snippet platform.
 */

/**
 * @param $people
 * @return string
 */
function extractEmail($people){
    $email = '';
    $people = json_decode($people);
    foreach ($people->data as $person){
        $email .= $person->email. ',';
    }
    return $email;
}

/**
 * @param $people
 * @return string
 */
function sortByAgeAndAddName($people){
    $people = json_decode($people, true);
    $result = [];
    foreach ($people['data'] as $person){
        $person['name'] = $person['first_name'] . ' ' . $person['last_name'];
        $result[] = $person;
    }
    array_multisort(array_column($result, 'age'), SORT_DESC, $result);
    $people = [
        'data' => $result
    ];
    return json_encode($people);
}

print_r(extractEmail($people));
print_r(sortByAgeAndAddName($people));