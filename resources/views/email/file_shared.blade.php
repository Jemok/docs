<p>
    {{ $model->file()->first()->file_name }}
</p>

<!-- Confirm your email display -->
<h1>New file Shared</h1>

<p>
   <a href="{{ asset('uploads/'. $model->file()->first()->file_name) }}"> Click this link to get the file </a>
</p>