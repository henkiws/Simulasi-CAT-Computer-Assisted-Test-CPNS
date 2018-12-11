   function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      return {
        'total': t,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }

    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var hoursSpan = clock.querySelector('.hours');
      var minutesSpan = clock.querySelector('.minutes');
      var secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
        var t = getTimeRemaining(endtime);
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
        if (t.total == 0){
            alert('habis');
        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 1.5 * 60 * 60 * 1000);
    initializeClock('clockdiv', deadline);

    // var counter = 1 ;
    $(document).ready(function(){
      var page = 1;
      var ljk = $('input[name="ljk"]').val();
      var token = $('input[name="_token"]').val();

      $.ajax({
        url: "ajax",
        type: "POST",
        data: {page: page, ljk: ljk, _token: token},
        beforeSend: function(){
          $('#res_soal').text('loading...');
          $('#res_pilihan').text('loading...');
        },
        success: function(res){
          $('#res_pilihan').text('');
          $('input[name="id"]').val(res.id);
          $('input[name="page"]').val(page);
          $('#res_soal').text(page+'. '+res.question['data']);
          res.options.forEach(function(item){
            var radioBtn = res.answer==item.id ? $('<input type="radio" name="answer" checked value="'+item.id+'"> '+item.option+' <br>') : $('<input type="radio" name="answer" value="'+item.id+'"> '+item.option+' <br>')
            radioBtn.appendTo('#res_pilihan');
          })
        }
      })

      $(document).on('click','a[name="lewat"]', function(e){
        // counter++
        if($('input[name="page"]').val() == 100){
          var page = 1;
        }else{
          var page = parseInt($('input[name="page"]').val()) + parseInt(1);
        }
        var ljk = $('input[name="ljk"]').val();
        var token = $('input[name="_token"]').val();

        $.ajax({
          url: "ajax",
          type: "POST",
          data: {page: page, ljk: ljk, _token: token},
          // beforeSend: function(){
          //   $('#res_soal').text('loading...');
          //   $('#res_pilihan').text('loading...');
          // },
          success: function(res){
            $('#res_pilihan').text('');
            $('input[name="id"]').val(res.id);
            $('input[name="page"]').val(page);
            $('#res_soal').text(page+'. '+res.question['data']);
            res.options.forEach(function(item){
              var radioBtn = res.answer==item.id ? $('<input type="radio" name="answer" checked value="'+item.id+'"> '+item.option+' <br>') : $('<input type="radio" name="answer" value="'+item.id+'"> '+item.option+' <br>')
              radioBtn.appendTo('#res_pilihan');
            })
          }
        })
      })

      $(document).on('click','a[name="ljk_num"]', function(e){
        e.preventDefault();
        var page = $(this).attr('data');
        var ljk = $('input[name="ljk"]').val();
        var token = $('input[name="_token"]').val();

        $.ajax({
          url: "ajax",
          type: "POST",
          data: {page: page, ljk: ljk, _token: token},
          // beforeSend: function(){
          //   $('#res_soal').text('loading...');
          //   $('#res_pilihan').text('loading...');
          // },
          success: function(res){
            $('#res_pilihan').text('');
            $('input[name="id"]').val(res.id);
            $('#res_soal').text(page+'. '+res.question['data']);
            $('input[name="page"]').val(page);
            res.options.forEach(function(item){
              var radioBtn = res.answer==item.id ? $('<input type="radio" name="answer" checked value="'+item.id+'"> '+item.option+' <br>') : $('<input type="radio" name="answer" value="'+item.id+'"> '+item.option+' <br>')
              radioBtn.appendTo('#res_pilihan');
            })
          }
        })

      })

      $('button[name="simpan"]').click(function(){
        var data = $('form').serializeArray();
          $.ajax({
            url: "answer",
            type: "POST",
            data: {id: data[1].value, page:data[2].value, answer: data[4].value, ljk: data[3].value, _token: data[0].value},
            success: function(resp){
              var page = parseInt(data[2].value) + parseInt(1);
              $.ajax({
                url: "ajax",
                type: "POST",
                data: {page: page, ljk: data[3].value, _token: token},
                success: function(res){
                  $('#ljk_'+data[2].value).attr('style','background-color: green;');
                  $('#res_pilihan').text('');
                  $('input[name="id"]').val(res.id);
                  $('#res_soal').text(page+'. '+res.question['data']);
                  $('input[name="page"]').val(page);
                  res.options.forEach(function(item){
                    var radioBtn = res.answer==item.id ? $('<input type="radio" name="answer" checked value="'+item.id+'"> '+item.option+' <br>') : $('<input type="radio" name="answer" value="'+item.id+'"> '+item.option+' <br>')
                    radioBtn.appendTo('#res_pilihan');
                  })
                }
              })
            }
          })

      })

      $('#btnSelesaiUjian').click(function(){
        if(confirm('Apakah anda yakin ?')){
          $.ajax({
            url: "finish",
            type: "POST",
            data: {_token: token, ljk: ljk},
            success: function(res){
              if(res.status){
                window.location.replace('profile')
              }else{
                alert('Silahkan Jawab Pertanyaan Dulu !!!');
              }
            }
          })
        }
      })

    })
  