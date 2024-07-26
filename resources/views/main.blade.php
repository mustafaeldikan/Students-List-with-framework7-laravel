<x-layout>
    <!-- Page -->
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
                            <td><input type='text' name='name' placeholder="Search Name"
                                    value='{{ request('name') }}'></td>
                            <td><input type='text' name='surname' placeholder="Search Surname"
                                    value='{{ request('surname') }}'></td>
                            <td><input type='text' name='birth_place' placeholder="Search birth place"
                                    value='{{ request('birth_place') }}'></td>
                            <td><input type='date' name='birth_date' placeholder="Serech Birth date"
                                    value='{{ request('birth_date') }}'></td>
                            <td><button class="button button-fill button-round ,button color-green"
                                    type='submit'>SEARCH</button></td>
                            <td><button class="button button-fill button-round ,button color-black" style="color: white"
                                    type='button' class='add-button'
                                    onclick='window.location.href=window.location.pathname'>CLEAR</button></td>
                        </form>
                    </tr>
                    <tr>
                        <form action="{{ route('student_store') }}" method="POST">
                            @csrf
                            <td></td>
                            <td><input type="text" name="name" placeholder="Enter First Name" class="tablo-input">
                            </td>
                            <td><input type="text" name="surname" placeholder="Enter Surname" class="tablo-input">
                            </td>
                            <td><input type="text" name="birth_place" placeholder="Enter Birth Place"
                                    class="tablo-input"></td>
                            <td><input type="date" name="birth_date" class="tablo-input"></td>
                            <td><button class="button button-fill button-round button color-green"
                                    type="submit">INSERT</button></td>
                            <td><button class="button button-fill button-round " type="reset">RESET</button>
                            </td>
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
                                        <input type="text" name="name" value="{{ old('name', $student->name) }}"
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
                                href="{{ route('students_index', ['edit_id' => $student->id, 'page' => request('page')]) }}">EDIT</a>
                        </td>
                        <td>
                            <a class="list-button color-red"
                                href="{{ route('student_delete', ['id' => $student->id]) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $student->id }}').submit();">DELETE</a>
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

</x-layout>
