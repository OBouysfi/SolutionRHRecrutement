<!DOCTYPE html>
<html>

<head>
    <style>
        /* class selected with color green and text bold */
        .selected-item {
            color: green;
            font-weight: bold;
        }

        /* validate btn style */
        .validate-btn {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>New Predictive Model Created</h1>

    <h3>Label: {{ $label . ' - ' . $company_name }}</h3>
    <h3>Profession: {{ __($profession) }}</h3>


    {{-- group of sections with title data --}}
    <h2><b>Data : </b></h2>
    @foreach (json_decode($data) as $value)
        <h3><b>{{ __($value->title) }} : </b></h3>

        @foreach ($value->value as $item)

            <ul>
                @foreach ($item as $sub_item)

                    <li>
                        
                        <b class="{{ $sub_item->selected ? 'selected-item' : '' }}"> {{ __($sub_item->label) }} </b>

                    </li>

                @endforeach
            </ul>

        @endforeach
    @endforeach

    <br>
    <br>
    {{-- button validate --}}
    <a href="{{ route('api.personalityTest.predictiveModel.validate', ['predictiveModelId' => $predictiveModelId]) }}" class="validate-btn" >Validate</a>
</body>

</html>
