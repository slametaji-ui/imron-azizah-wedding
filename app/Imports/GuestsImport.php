<?php

namespace App\Imports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\ToModel;

class GuestsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Start importing from the second column (index 1 for fullname, index 2 for address, and index 3 for phone_number)
        $fullname = isset($row[1]) ? trim(str_replace("'", ' ', $row[1])) : null;
        $address = isset($row[2]) ? trim(str_replace("'", ' ', $row[2])) : null;

        // Format phone number
        $phone_number = isset($row[3]) ? $this->formatPhoneNumber(trim($row[3])) : null;

        // Only create a new Guest if both fullname and address are not empty
        if (!empty($fullname) && !empty($address) && $fullname !== 'Nama' && $address !== 'Alamat') {
            return new Guest([
                'fullname' => $fullname,
                'address' => $address,
                'phone_number' => $phone_number, // Store formatted phone number
            ]);
        }

        return null; // Skip the row if conditions are not met
    }

    /**
     * Format the phone number from +62 xxx-xxx-xxxx to 62xxxxxxxxxx
     *
     * @param string $phoneNumber
     * @return string|null
     */
    private function formatPhoneNumber($phoneNumber)
    {
        // Remove non-numeric characters (all except digits)
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // If the phone number starts with 62, return it as is
        if (substr($phoneNumber, 0, 2) === '62') {
            return $phoneNumber;
        }

        // If the phone number starts with +62, replace + with 62
        if (substr($phoneNumber, 0, 3) === '+62') {
            return '62' . substr($phoneNumber, 3);
        }

        // If it's not a valid Indonesian number, return null or handle accordingly
        return null;
    }
}
