<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Choice</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('upload-img/logo.jpg') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Summernote (Rich Text Editor) -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- DataTables -->
    <script src="{{ URL('js/jquery.dataTables.min.js') }}"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        @include('admin.app.menu')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin.app.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4">
                <div class="container mx-auto">
                    @yield('admin_content')
                </div>
            </main>

            @include('admin.app.footer')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editorElement = document.querySelector('#ckediter');
            if (editorElement) {
                ClassicEditor
                    .create(editorElement, {
                        // Basic plugin configuration
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable'],
                        // Configuration to avoid special characters issues
                        entities: {
                            latin: false
                        }
                    })
                    .then(editor => {
                        console.log('CKEditor initialized successfully');
                        
                        // Store a reference to the editor
                        window.editor = editor;
                        
                        // Get the form containing the editor
                        const form = editorElement.closest('form');
                        if (form) {
                            form.addEventListener('submit', function(e) {
                                // Get the CKEditor content
                                const editorData = editor.getData();
                                
                                // Find the original textarea
                                const textarea = form.querySelector('textarea[name="mo_ta"]');
                                
                                // Update the textarea value
                                if (textarea) {
                                    textarea.value = editorData;
                                    
                                    // If the textarea has the required attribute and is empty, prevent form submission
                                    if (textarea.hasAttribute('required') && !editorData.trim()) {
                                        e.preventDefault();
                                        // Find the error message span
                                        const errorMsg = form.querySelector('#editor-error');
                                        if (errorMsg) {
                                            errorMsg.classList.remove('hidden');
                                        } else {
                                            // Fallback to alert if the error span doesn't exist
                                            alert('Vui lòng nhập mô tả sản phẩm');
                                        }
                                        return false;
                                    } else {
                                        // Hide the error message if it exists
                                        const errorMsg = form.querySelector('#editor-error');
                                        if (errorMsg) {
                                            errorMsg.classList.add('hidden');
                                        }
                                    }
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error('CKEditor initialization error:', error);
                    });
            } else {
                console.log('CKEditor element not found on this page');
            }
        });
    </script>
</body>

</html>
