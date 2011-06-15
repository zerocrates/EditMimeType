<?php

add_plugin_hook('admin_append_to_files_form', 'edit_mime_type_form');
add_plugin_hook('before_save_form_file', 'edit_mime_type_save');

function edit_mime_type_form($file) {
    echo '<h2>File MIME Type</h2>';
    echo "<p><strong>Detected Type (OS):</strong> {$file->type_os}</p>";
    echo __v()->formLabel('mimetype', 'MIME Type');
    echo __v()->formText('mimetype', $file->mime_browser, array('class' => 'textinput'));
}

function edit_mime_type_save($file, $post) {
    if (array_key_exists('mimetype', $post)) {
        $type = trim((string)$post['mimetype']);
        if ($type) {
            $file->mime_browser = $type;
        }
    }
}
