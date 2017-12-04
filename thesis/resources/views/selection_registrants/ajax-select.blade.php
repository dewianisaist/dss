<option>--- Pilih Jadwal Seleksi ---</option>
@if(!empty($schedules))
  @foreach($schedules as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif