jQuery(document).ready(function($){
  var chack_page = $('[name="send_data_page_chack"]').attr('content');
  var dxp_nonce = $('[name="dxp_nonce"]').attr('content');
  if (chack_page != undefined) {
    
    $(document).on('submit', '#dxp_update_game_data', function(e){
      e.preventDefault();
      $('.dxp_loading').show();
     var dxp_url = $('#dxp_url').val();
     var dxp_key = $('#dxp_key').val();
     if (dxp_url == '') {
       alert('!Error: Url field is required');
       $('.dxp_loading').hide();
       return false;
     }
     if (dxp_key == '') {
       alert('!Error: Key field is required');
       $('.dxp_loading').hide();
       return false;
     }
      
      $.ajax({
        type: 'POST',
        url:  ajaxurl,
        data:{
          action:     'dxp_get_game_data',
          dxp_nonce: dxp_nonce
        },
        success: function(data){
          if (data == 'error') {
            alert('Error!');
            $('.dxp_loading').hide();
            location.reload();
          } else {
            if (!data) {
              alert('Error!');
              $('.dxp_loading').hide();
              location.reload();
              return false;
            }
            var data = JSON.parse(data);
            var a1 = 0;
            var chack_current = 'class="dxp_current"';
            $('#dxp_data_count').val(data.length);
            $.each(data, function(k, v) {
              var data_html = '<li '+chack_current+'>'+
              '<input type="hidden" name="player_id" value="'+v.player_id+'"/>'+
              '<input type="hidden" name="player_ip" value="'+v.player_ip+'"/>'+
              '<input type="hidden" name="player_name" value="'+v.player_name+'"/>'+
              '<input type="hidden" name="time_add" value="'+v.time_add+'"/>'+
              '<input type="hidden" name="time_edit" value="'+v.time_edit+'"/>'+
              '<input type="hidden" name="kills" value="'+v.player_stats.kills+'"/>'+
              '<input type="hidden" name="deaths" value="'+v.player_stats.deaths+'"/>'+
              '<input type="hidden" name="teamkills" value="'+v.player_stats.teamkills+'"/>'+
              '<input type="hidden" name="teamdeaths" value="'+v.player_stats.teamdeaths+'"/>'+
              '<input type="hidden" name="suicides" value="'+v.player_stats.suicides+'"/>'+
              '<input type="hidden" name="ratio" value="'+v.player_stats.ratio+'"/>'+
              '<input type="hidden" name="skill" value="'+v.player_stats.skill+'"/>'+
              '<input type="hidden" name="assists" value="'+v.player_stats.assists+'"/>'+
              '<input type="hidden" name="assistskill" value="'+v.player_stats.assistskill+'"/>'+
              '<input type="hidden" name="curstreak" value="'+v.player_stats.curstreak+'"/>'+
              '<input type="hidden" name="winstreak" value="'+v.player_stats.winstreak+'"/>'+
              '<input type="hidden" name="rounds" value="'+v.player_stats.rounds+'"/>'+
              '<input type="hidden" name="fixed_name" value="'+v.player_stats.fixed_name+'"/>'+
              '</li>';
              $('ul#dxp_data_load_html').append(data_html);
              if (a1 == 0) {
                chack_current = 'class=""';
              }
              a1++;
            });
            setTimeout(function(){ 
              dxp_update_data_into_database($);
            }, 1000);
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          alert('!Error');
          $('.dxp_loading').hide();
          location.reload();
        }
    
      });
      
    });
    
  }

  });
  
  
  function dxp_update_data_into_database(e){
    var dxp_nonce = e('[name="dxp_nonce"]').attr('content');
    var chack_data = e('#dxp_data_load_html');
    var current = chack_data.find('.dxp_current');
    var data_next  = current.next();
    if (current.length > 0) {
      e.ajax({
        type: 'POST',
        url:  ajaxurl,
        data:{
          action:     'dxp_update_data_into_database',
          dxp_nonce: dxp_nonce,
          player_id : current.find('[name="player_id"]').val(),
          player_ip : current.find('[name="player_ip"]').val(),
          player_name : current.find('[name="player_name"]').val(),
          time_add : current.find('[name="time_add"]').val(),
          time_edit : current.find('[name="time_edit"]').val(),
          kills : current.find('[name="kills"]').val(),
          deaths : current.find('[name="deaths"]').val(),
          teamkills : current.find('[name="teamkills"]').val(),
          teamdeaths : current.find('[name="teamdeaths"]').val(),
          suicides : current.find('[name="suicides"]').val(),
          ratio : current.find('[name="ratio"]').val(),
          skill : current.find('[name="skill"]').val(),
          assists : current.find('[name="assists"]').val(),
          assistskill : current.find('[name="assistskill"]').val(),
          curstreak : current.find('[name="curstreak"]').val(),
          winstreak : current.find('[name="winstreak"]').val(),
          rounds : current.find('[name="rounds"]').val(),
          fixed_name : current.find('[name="fixed_name"]').val(),
        },
        success: function(data){
          if (data == 'error') {
              alert('Error!');
              e('.dxp_loading').hide();
              location.reload();
          }else{
            if (data_next.length > 0) {
              chack_data.find('li').removeClass('dxp_current');
              current.next().addClass('dxp_current');
              dxp_update_data_into_database(e);
            }else{
              alert('Update successful');
              e('.dxp_loading').hide();
              location.reload();
            }
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            alert('Error!');
            e('.dxp_loading').hide();
            location.reload();
        }
      
      });
    }
  };