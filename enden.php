<?php

function encrypt($plaintext, $key) {
    $method = 'aes-256-cbc'; // Encryption method
    $ivlen = openssl_cipher_iv_length($method); 
    $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);

    // Store the IV with the ciphertext (e.g., by concatenating)
    $ciphertext = base64_encode($iv . $ciphertext); 

    return $ciphertext;
}

function decrypt($ciphertext, $key) {
    $method = 'aes-256-cbc'; 
    $ivlen = openssl_cipher_iv_length($method); 
    $ciphertext_dec = base64_decode($ciphertext);
    $iv = substr($ciphertext_dec, 0, $ivlen);
    $ciphertext_dec = substr($ciphertext_dec, $ivlen);

    $plaintext = openssl_decrypt($ciphertext_dec, $method, $key, OPENSSL_RAW_DATA, $iv);

    return $plaintext;
}

// Example Usage
$plaintext = "Gandu jaida mat apna GGand mat pel";
$key = '4096'; // Replace with a strong, unique key

$encrypted_text = encrypt($plaintext, $key);
echo "Encrypted Text: " . $encrypted_text . "\n";

$decrypted_text = decrypt($encrypted_text, $key);
echo "Decrypted Text: " . $decrypted_text . "\n";

?>