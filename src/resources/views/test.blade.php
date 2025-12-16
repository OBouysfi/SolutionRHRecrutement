@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="mb-4">Search Country by Capital</h1>
        <div class="mb-3">
            <input type="text" id="capitalInput" class="form-control" placeholder="Enter capital name...">
            <button id="searchCapital" class="btn btn-theme mt-2">Search</button>
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Capital</th>
                    <th>Region</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody id="countryTable">
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('searchCapital').addEventListener('click', function() {
            let capital = document.getElementById('capitalInput').value;
            if (!capital) {
                alert('Please enter a capital name.');
                return;
            }

            fetch(`https://restcountries.com/v3.1/capital/${capital}`)
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById('countryTable');
                    tableBody.innerHTML = '';
                    data.forEach(country => {
                        let row = `<tr>
                        <td>${country.name.common}</td>
                        <td>${country.capital ? country.capital[0] : 'N/A'}</td>
                        <td>${country.region}</td>
                        <td>${country.population.toLocaleString()}</td>
                    </tr>`;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
@endsection
