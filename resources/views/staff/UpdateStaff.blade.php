<title>Update</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/updatestaff.css') }}">
<div class="center">
    <h1>Cập nhật thông tin</h1>
    <form action="{{ route('update') }}" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{ $edit->book_id }}">
        <div class="inputbox">
            <input type="text" required="required" name="staff_name" value="{{ $edit->staff_name }}" />
            <span>Tên nhân viên</span>
        </div>
        <div class="inputbox">
            <input type="date" name="staff_phone" value="{{ $edit['staff_phone'] }}" />
            <span>Ngày nhận phòng</span>
        </div>
        <div class="inputbox">
            <input type="time" name="room_time" value="{{ $edit['room_time'] }}" />
            <span>Thời gian checkin</span>
        </div>
      
        <div class="inputbox">
            <button> Cập nhật</button>
        </div>
    </form>
</div>