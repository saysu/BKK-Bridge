
<div class="col-md-3">
  <form class="form-inline mb-5 mt-5">
      <label for="due_date-field" class="mb-1" >■開催日よりイベントを検索</label>
      <div style="overflow:hidden;">
          <div class="form-group">
              <div class="row">
                  <div class="col-12 mb-1">


                      {{--日付検索 --}}
                      <div class="input-group mb-1">
                      <input name="date" type="text" id="input-date" class="form-control" placeholder=""
                          aria-label="Recipient's username" aria-describedby="button-addon2">

                      <button type="submit" name="submit" value="検索" class="btn-bkk1 btn btn-outline-info"
                          id="button-addon2">検索</button>
                      </div>
                  </div>
                  <div class="col-12">
                      <div id="datetimepicker12"></div>
                  </div>
              </div>
          </div>
      </div>
  </form>

  <div>
      <hr>
      <label for="due_date-field">■キーワード検索</label>
      <form class="form-inline">
          <div class="form-group">

              <input name="keyword" type="text" id="input-date" class="form-control" placeholder="タイトル、内容、場所" aria-label="Recipient's username" aria-describedby="button-addon2">

              <button type="submit" name="submit" value="検索" class="btn-bkk2 btn btn-outline-info"
                  id="button-addon2">検索</button>

          </div>
      </form>
  </div>
{{-- 人気イベント --}}

<div class="row">
<div class="col-md-12">
  <?php $n = 1 ?>
@foreach( $rankingEvents as $rankingEvent )
<div class="row my-5">
<p>{{ $n }}番人気のイベント</p>
<div class="card">
<img src="{{ $rankingEvent->image }}" class="card-img-top rankingpic" alt="...">
  <div class="card-body">
  <a href="{{ route('events.show',$rankingEvent->id) }}"><p class="card-text">{{ $rankingEvent->title }}</p></a>
    
  </div>
</div>
</div>
<?php $n++ ?>
@endforeach

</div>
</div>

</div>