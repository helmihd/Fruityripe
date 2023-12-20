@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>adelinefellita</title>
@endsection

@section('content')
    <div class="wrapper" id="profile-card">
        <div class="left">
            <input type="file" id="profileImageInput" style="display: none;">
            <label for="profileImageInput">
                <img src="{{ asset('images/adeline.png') }}" alt="" id="profileImage" width="100">
            </label>
            <h4 id="username">adelinefellita</h4>
            <p>Intermediate</p>
        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info-data" id="edit-form" style="display: none;">
                    <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="data">
                            <h4>Firstname</h4>
                            <input type="text" id="firstname" value="{{ $user['firstname'] }}">
                        </div>
                        <div class="data">
                            <h4>Lastname</h4>
                            <input type="text" id="lastname" value="{{ $user['lastname'] }}">
                        </div>
                        <!-- Tambahkan ID pada tombol Save dan tombol Cancel -->
                        <div class="button-save-cancel">
                            <button type="submit" id="saveButton">Save</button>
                            <button type="button" id="cancelButton" onclick="cancelEdit()">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="data" id="display-data">
                    <h4>Firstname</h4>
                    <p>{{ $user['firstname'] }}</p>
                </div>
                <div class="data" id="lastname-data">
                    <h4>Lastname</h4>
                    <p>{{ $user['lastname'] }}</p>
                </div>
                <div class="data">
                    <h4>Email</h4>
                    <p>{{ $user['email'] }}</p>
                </div>
                <div class="data">
                    <h4>Username</h4>
                    <p>{{ session('username') }}</p>
                </div>
                <button class="edit-button" id="editable-username" onclick="toggleEditForm()"><i class="fa-regular fa-pen-to-square"></i>Edit profile</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#icon-menu').click(function(){
                $('ul').toggleClass('show');
            });
        });
    </script>

    <script>
        function toggleEditForm() {
            const editForm = document.getElementById('edit-form');
            const displayData = document.getElementById('display-data');
            const lastnameData = document.getElementById('lastname-data');
            const editableUsername = document.getElementById('editable-username');

            const saveButton = document.getElementById('saveButton');
            const cancelButton = document.getElementById('cancelButton');

            if (editForm.style.display === 'none') {
                // Switch to edit mode
                displayData.style.display = 'none';
                lastnameData.style.display = 'none';
                editableUsername.style.display = 'none';
                editForm.style.display = 'block';

                // Tampilkan tombol Save dan tombol Cancel
                saveButton.style.display = 'inline-block';
                cancelButton.style.display = 'inline-block';
            } else {
                // Switch back to display mode
                displayData.style.display = 'block';
                lastnameData.style.display = 'block';
                editableUsername.style.display = 'block';
                editForm.style.display = 'none';

                // Sembunyikan tombol Save dan tombol Cancel
                saveButton.style.display = 'none';
                cancelButton.style.display = 'none';
            }
        }

        function cancelEdit() {
            // Switch back to display mode without saving changes
            toggleEditForm();
        }

        document.getElementById('profile-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission

            // Mengambil nilai dari input
            const firstnameInput = document.getElementById('firstname');
            const lastnameInput = document.getElementById('lastname');

            // Mengambil username dari sesi
            const username = '{{ session('username') }}';

            // Mengirim data ke server (ProfileController) menggunakan AJAX
            fetch('{{ route('profile.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                cache: 'no-cache',
                body: JSON.stringify({
                    username: username,
                    firstname: firstnameInput.value,
                    lastname: lastnameInput.value,
                    // Anda bisa menambahkan field lain yang perlu diperbarui
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Update tampilan dengan nilai baru
                const displayData = document.getElementById('display-data');
                const lastnameData = document.getElementById('lastname-data');
                displayData.innerHTML = '<h4>Firstname</h4><p>' + data.firstname + '</p>';
                lastnameData.innerHTML = '<h4>Lastname</h4><p>' + data.lastname + '</p>';

                // Switch back to display mode
                toggleEditForm();

                // Redirect ke halaman profil
                window.location.href = '/profile';
            })
            .catch(error => {
                console.error('Gagal memperbarui data profil:', error);
            });
        });

        function cancelEdit() {
            // Switch back to display mode without saving changes
            toggleEditForm();
        }


        // Buat upload foto
        document.getElementById('profileImageInput').addEventListener('change', handleImageUpload);

        function handleImageUpload(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function () {
                const image = document.getElementById('profileImage');
                image.src = reader.result;
            };

            if (input.files.length > 0) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection