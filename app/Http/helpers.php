<?php

 function numberInWords(
    $number,
    $stripFractional = false,
    $money = true,
    $genderIn = null,
    $case = 'nominative'
)
{
    static $dictionary;

    if ($number > 999999999999) {
        throw new Exception('Интерфейс не поддерживает преобразование чисела в строку, если число больше 999999999999 (длинее 12 символов)');
    }

    if (is_null($dictionary)) {
        $dictionary = [
            'nominative' => [
                'nul' => 'ноль',
                'ten' => [
                    ['', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'], // муж. род
                    ['', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'], // жен. род
                    ['', 'одно', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'], // ср.  род
                ],
                'a20' => [
                    'десять',
                    'одиннадцать',
                    'двенадцать',
                    'тринадцать',
                    'четырнадцать',
                    'пятнадцать',
                    'шестнадцать',
                    'семнадцать',
                    'восемнадцать',
                    'девятнадцать',
                ],
                'tens' => [
                    2 => 'двадцать',
                    'тридцать',
                    'сорок',
                    'пятьдесят',
                    'шестьдесят',
                    'семьдесят',
                    'восемьдесят',
                    'девяносто',
                ],
                'hundred' => [
                    '',
                    'сто',
                    'двести',
                    'триста',
                    'четыреста',
                    'пятьсот',
                    'шестьсот',
                    'семьсот',
                    'восемьсот',
                    'девятьсот',
                ],
                'unit' => [ // Units
                    ['копейка', 'копейки', 'копеек', 1],
                    ['рубль', 'рубля', 'рублей', 0],
                    ['тысяча', 'тысячи', 'тысяч', 1],
                    ['миллион', 'миллиона', 'миллионов', 0],
                    ['миллиард', 'миллиарда', 'миллиардов', 0],
                ],
            ],
            'genitive' => [
                'nul' => 'ноля',
                'ten' => [
                    ['', 'одого', 'двух', 'трех', 'четырех', 'пяти', 'шести', 'семи', 'восеми', 'девяти'],
                    ['', 'одной', 'двух', 'трех', 'четырех', 'пяти', 'шести', 'семи', 'восеми', 'девяти'],
                    ['', 'одного', 'двух', 'трех', 'четырех', 'пяти', 'шести', 'семи', 'восеми', 'девяти'],
                ],
                'a20' => [
                    'десяти',
                    'одиннадцати',
                    'двенадцати',
                    'тринадцати',
                    'четырнадцати',
                    'пятнадцати',
                    'шестнадцати',
                    'семнадцати',
                    'восемнадцати',
                    'девятнадцати',
                ],
                'tens' => [
                    2 => 'двадцати',
                    'тридцати',
                    'сорока',
                    'пятидесяти',
                    'шестидесяти',
                    'семидесяти',
                    'восемидесяти',
                    'девяносто',
                ],
                'hundred' => [
                    '',
                    'ста',
                    'двухсот',
                    'трехсот',
                    'четырёхсот',
                    'пятисот',
                    'шестисот',
                    'семиста',
                    'восемиста',
                    'девятиста',
                ],
                'unit' => [ // Units
                    ['копейки', 'копеек', 'копеек', 1],
                    ['рубля', 'рублей', 'рублей', 0],
                    ['тысячи', 'тысяч', 'тысяч', 1],
                    ['миллиона', 'миллиона', 'миллионов', 0],
                    ['миллиарда', 'миллиарда', 'миллиардов', 0],
                ],
            ],
        ];
    }

    if (!array_key_exists($case, $dictionary)) {
        $case = 'nominative';
    }

    $nul = $dictionary[$case]['nul'];
    $ten = $dictionary[$case]['ten'];
    $a20 = $dictionary[$case]['a20'];
    $tens = $dictionary[$case]['tens'];
    $hundred = $dictionary[$case]['hundred'];
    $unit = $dictionary[$case]['unit'];

    list($rub, $kop) = explode('.', sprintf('%015.2f', floatval($number)));

    $out = [];
    if (intval($rub) > 0) {
        foreach (str_split($rub, 3) as $uk => $v) { // by 3 symbols
            if (!intval($v)) {
                continue;
            }
            $uk = sizeof($unit) - $uk - 1; // unit key
            if ($money || $uk > 1) {
                $gender = $unit[$uk][3];
            } elseif (!$money && $genderIn !== null) {
                $gender = $genderIn;
            }
            $gender = $gender ?? 0;
            list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
            // mega-logic
            $out[] = $hundred[$i1]; # 1xx-9xx
            if ($i2 > 1) {
                $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3];
            } # 20-99
            else {
                $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3];
            } # 10-19 | 1-9
            // units without rub & kop
            if ($uk > 1) {
                $out[] = numberMorph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
            }
        }
    } else {
        $out[] = $nul;
    }
    if ($money) {
        $out[] = numberMorph($rub, $unit[1][0], $unit[1][1], $unit[1][2]); // rub

        if (!$stripFractional) {
            $out[] = $kop . ' ' . numberMorph($kop, $unit[0][0], $unit[0][1], $unit[0][2]);
        } // kop
    }

    return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
}

function numberMorph($n, $f1, $f2, $f5)
{
    $n = substr($n, -2);
    if ($n > 10 && $n < 20) {
        return $f5;
    }
    $n = $n % 10;
    if ($n > 1 && $n < 5) {
        return $f2;
    }
    if ($n == 1) {
        return $f1;
    }

    return $f5;
}
