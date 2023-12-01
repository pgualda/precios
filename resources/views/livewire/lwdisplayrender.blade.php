<div style="height: 100%; background:{{ $grid->background }}
    url({{ asset($grid->img_fondo) }}) 0 0 / 100% 100%
    no-repeat;" wire:poll.5000ms>


    {{-- <div style="height: 100%; background:{{ $grid->background }};" wire:poll.5000ms> --}}
    <div class="container-fluid" style="height: 100%;">
        <!-- barre rows -->
        @foreach ($rows as $row)
            <div class="{{ $row['this_bt'] }}" style="{{ $row['this_st'] }}">

                <!-- barre cols -->
                @foreach ($row['cols'] as $col)
                    <div class="{{ $col['this_bt'] }}" style="{{ $col['this_st'] }}">

                        @foreach ($col['elements'] as $element)
                            @if ($element['img_file'])
                                <!-- imagen ($element['img_file']) -->
                                {{-- <div class="p-2 d-flex flex-row" style="height: 40%;"> --}}
                                <div class="{{ $element['this_bt'] }} d-flex {{ $element['img_direction'] }}"
                                    style="{{ $element['this_st'] }}">

                                    <!-- imagen -->
                                    <img src="{{ asset($element['img_file']) }}" class="{{ $element['this_img_bt'] }}"
                                        style="object-fit:cover; {{ $element['this_img_st'] }}">
                                    <!-- precio -->
                                    @if ($element['precio'] > 0)
                                        {{-- text_st_height solo aplica cuando hay imagen --}}
                                        <div class="d-flex justify-content-between align-items-center {{ $element['this_bt'] }}"
                                            style="{{ $element['text_st_height'] }}">
                                            <div class="">
                                                <span class="{{ $element['text_bt_size'] }}" style="">
                                                    {{ $element['text_text'] }}
                                                </span>
                                            </div>
                                            <div class="">
                                                <span class="{{ $element['text_bt_size'] }}" style="">
                                                    ${{ $element['precio'] }}
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        @if ($element['text_text'])
                                            <span class="{{ $element['text_bt_size'] }}"
                                                style="">{{ $element['text_text'] }}</span>
                                        @endif
                                    @endif
                                    <!-- barre elements -->
                                </div> <!-- cierra row -->
                            @else
                                @if ($element['precio'] > 0)
                                    <div class="d-flex justify-content-between align-items-center {{ $element['this_bt'] }}"
                                        style="{{ $element['this_st'] }}">
                                        <div class="">
                                            <span class="{{ $element['text_bt_size'] }}" style="">
                                                {{ $element['text_text'] }}
                                            </span>
                                        </div>
                                        <div class="">
                                            <span class="{{ $element['text_bt_size'] }}" style="">
                                                ${{ $element['precio'] }}
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center {{ $element['this_bt'] }}"
                                        style="{{ $element['this_st'] }}">
                                        <span class="{{ $element['text_bt_size'] }}"
                                            style="">{{ $element['text_text'] }} </span>
                                    </div>
                                @endif
                            @endif
                        @endforeach

                        <!-- fin elements -->
                    </div> <!-- cierra row -->
                @endforeach
                <!-- fin cols -->
            </div> <!-- cierra row -->
        @endforeach
        <!-- fin -->
    </div>
</div>
