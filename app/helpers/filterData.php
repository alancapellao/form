<?php

function filterData(array $data, ?array $requiredFields = null): array|bool
{
    foreach ($data as $key => &$value) {
        $value = trim($value);
        $value = strip_tags($value);

        if ($requiredFields && in_array($key, $requiredFields) && empty($value)) {
            return false;
        }
    }

    return $data;
}
