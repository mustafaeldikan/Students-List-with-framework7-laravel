<x-layout>
    <!-- Page -->

    <div class="page">
        <!-- Navbar -->

        <div class="navbar">
            <div class="navbar-bg"></div>
            <div class="navbar-inner">

                <div class="title">Students List</div>
                <div class="right">
                    <button id="theme-toggle" class="button button-fill button-round button color-black">Dark & Light
                        Mode</button>
                </div>

            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Card -->
            <div class="card data-table">
                <!-- Table -->
                <table>
                    <thead>
                        <tr>
                            <th class="label-cell" style="font-size: 20px;"><a
                                    href="{{ route('students_index', ['sort_by' => 'id', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="item-link item-content external">Sid</a>
                            </th>
                            <th class="label-cell" style="font-size: 20px;"><a
                                    href="{{ route('students_index', ['sort_by' => 'name', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="item-link item-content external">First
                                    Name</a></th>
                            <th class="label-cell" style="font-size: 20px;"><a
                                    href="{{ route('students_index', ['sort_by' => 'surname', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="item-link item-content external">Surname</a>
                            </th>
                            <th class="label-cell" style="font-size: 20px;"><a
                                    href="{{ route('students_index', ['sort_by' => 'birth_place', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="item-link item-content external">Birth
                                    Place</a></th>
                            <th class="label-cell" style="font-size: 20px;"><a
                                    href="{{ route('students_index', ['sort_by' => 'birth_date', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"
                                    class="item-link item-content external">Birth
                                    Date</a></th>
                            <th class="label-cell" style="font-size: 20px;"><strong>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="{{ route('students_index') }}" method="GET">
                                <td><input type='hidden' name='search' value=''></td>
                                <td><input type='text' name='name' value='{{ request('name') }}'></td>
                                <td><input type='text' name='surname' value='{{ request('surname') }}'></td>
                                <td><input type='text' name='birth_place' value='{{ request('birth_place') }}'></td>
                                <td><input type='date' name='birth_date' value='{{ request('birth_date') }}'></td>
                                <td><button class="button button-fill button-round ,button color-green"
                                        type='submit'>SEARCH</button></td>
                                <td><button class="button button-fill button-round ,button color-black"
                                        style="color: white" type='button' class='add-button'
                                        onclick='window.location.href=window.location.pathname'>CLEAR</button></td>
                            </form>
                        </tr>
                        <tr>
                            <form action="{{ route('student_store') }}" method="POST">
                                @csrf
                                <td></td>
                                <td><input type="text" name="name" placeholder="Enter First Name"
                                        class="tablo-input"></td>
                                <td><input type="text" name="surname" placeholder="Enter Last Name"
                                        class="tablo-input"></td>
                                <td><input type="text" name="birth_place" placeholder="Enter Birth Place"
                                        class="tablo-input"></td>
                                <td><input type="date" name="birth_date" class="tablo-input"></td>
                                <td><button class="button button-fill button-round button color-green"
                                        type="submit">INSERT</button></td>
                                <td><button class="button button-fill button-round " type="reset">RESET</button></td>
                            </form>
                        </tr>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>
                                    @if (request('edit_id') == $student->id)
                                        <form
                                            action="{{ route('student_update', ['id' => $student->id, 'edit_id' => request('edit_id')]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="edit_id" value="{{ request('edit_id') }}">
                                            <input type="text" name="name"
                                                value="{{ old('name', $student->name) }}"
                                                style="background-color: rgb(171, 167, 167);">
                                        @else
                                            {{ $student->name }}
                                    @endif
                                </td>
                                <td>
                                    @if (request('edit_id') == $student->id)
                                        <input type="text" name="surname"
                                            value="{{ old('surname', $student->surname) }}"
                                            style="background-color: rgb(171, 167, 167);">
                                    @else
                                        {{ $student->surname }}
                                    @endif
                                </td>
                                <td>
                                    @if (request('edit_id') == $student->id)
                                        <input type="text" name="birth_place"
                                            value="{{ old('birth_place', $student->birth_place) }}"
                                            style="background-color: rgb(171, 167, 167);">
                                    @else
                                        {{ $student->birth_place }}
                                    @endif
                                </td>
                                <td>
                                    @if (request('edit_id') == $student->id)
                                        <input type="date" name="birth_date"
                                            value="{{ old('birth_date', $student->birth_date) }}"
                                            style="background-color: rgb(171, 167, 167);">
                                </td>
                                <input type="hidden" name="page" value="{{ request('page') }}">
                                <td><button class="button button-fill button-round button color-orange"
                                        type="submit">Update</button>
                                    </form>
                                @else
                                    {{ $student->birth_date }}
                        @endif
                        @if (request('edit_id') == $student->id)
                            <td><a class="item-link item-content external color-green"
                                    href="{{ route('students_index') }}">Cancel</a></td>
                        @else
                            <td><a class="list-button color-blue item-link item-content external"
                                    href="{{ route('students_index', ['edit_id' => $student->id, 'page' => request('page')]) }}"><strong>EDIT</strong></a>
                            </td>
                            <td>
                                <a class="list-button color-red"
                                    href="{{ route('student_delete', ['id' => $student->id]) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $student->id }}').submit();"><strong>DELETE</strong></a>
                                <form id="delete-form-{{ $student->id }}"
                                    action="{{ route('student_delete', ['id' => $student->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="page" value="{{ request('page') }}">
                                </form>
                            </td>
                        @endif
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <x-pagination :paginator="$students" />
            </div>
        </div>

        <script>
            document.querySelectorAll('.tablo-input').forEach((input, index, inputs) => {
                input.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        const nextInput = inputs[index + 1];
                        if (nextInput) {
                            nextInput.focus();
                        }
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', (event) => {
                const toggleButton = document.getElementById('theme-toggle');
                const currentTheme = localStorage.getItem('theme');

                if (currentTheme === 'dark') {
                    document.documentElement.classList.add('dark-mode');
                }

                toggleButton.addEventListener('click', () => {
                    document.documentElement.classList.toggle('dark-mode');
                    let theme = 'light';
                    if (document.documentElement.classList.contains('dark-mode')) {
                        theme = 'dark';
                    }
                    localStorage.setItem('theme', theme);
                });
            });
        </script>


        <style>
            :root {
                --background-color-light: #ffffff;
                --text-color-light: #000000;
                --button-background-light: #007bff;
                --button-text-light: #ffffff;
                --navbar-background-light: #f8f9fa;
                --card-background-light: #ffffff;
                --card-border-light: #e1e1e1;

                --background-color-dark: #121212;
                --text-color-dark: #e0e0e0;
                --button-background-dark: #1e88e5;
                --button-text-dark: #ffffff;
                --navbar-background-dark: #1c1c1c;
                --card-background-dark: #1f1f1f;
                --card-border-dark: #333333;

                --background-color: var(--background-color-light);
                --text-color: var(--text-color-light);
                --button-background: var(--button-background-light);
                --button-text: var(--button-text-light);
                --navbar-background: var(--navbar-background-light);
                --card-background: var(--card-background-light);
                --card-border: var(--card-border-light);
            }

            .dark-mode {
                --background-color: var(--background-color-dark);
                --text-color: var(--text-color-dark);
                --button-background: var(--button-background-dark);
                --button-text: var(--button-text-dark);
                --navbar-background: var(--navbar-background-dark);
                --card-background: var(--card-background-dark);
                --card-border: var(--card-border-dark);
            }

            body {
                background-color: var(--background-color);
                color: var(--text-color);
                font-family: Arial, sans-serif;
                transition: background-color 0.3s, color 0.3s;
                margin: 0;
                padding: 0;
            }

            .navbar {
                background-color: var(--navbar-background);
                color: var(--text-color);
                padding: 15px;
                text-align: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card {
                background-color: var(--card-background);
                border: 1px solid var(--card-border);
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin: 20px;
                transition: background-color 0.3s, border-color 0.3s;
            }

            button {
                background-color: var(--button-background);
                color: var(--button-text);
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s, color 0.3s;
            }

            button:hover {
                opacity: 0.8;
            }

            .theme-toggle-container {
                text-align: center;
                margin-top: 20px;
            }
        </style>



</x-layout>
