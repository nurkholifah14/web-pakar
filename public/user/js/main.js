$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$('#search-rekomendasi').on('submit', function(e){
    e.preventDefault()
    let searchId = $('#search-input').val()
    if (searchId.length != 0) {
        window.location = '/analisa/'+searchId
    }
})

$('.btn-answer').on('click', function(){
    $('.btn-answer').attr('disabled', 'disabled')
    $(this).addClass('active')
    $('.loading-progress').attr('style', 'width:1%')
    $('.loading-outline').addClass('active')
    $('.loading-progress').addClass('active')

    let progress = .5
    let progressInterval = setInterval(() => {
        $('.loading-progress').attr('style', 'width:'+progress+'%')
        progress = progress + .5
        if (progress == 90) {
            clearInterval(progressInterval)
        }
    }, 10);

    let idAnalisa = $('#idAnalisa').val()
    let premis = $('#premis').val()
    let no = $('#no').val()
    let Jawaban = $(this).data('answer')
    $.ajax({
        type:'post',
        url:'/proses-diagnosa',
        data:{
            
            idAnalisa:idAnalisa,
            premis:premis,
            no:no,
            Jawaban:Jawaban,
        },
        success:function(data){
            console.log(data)
            if (data == 'failed') {
                window.location = '/hasil/'+idAnalisa
            }else if(data == 'selesai'){
                window.location = '/hasil/'+idAnalisa
            }else{
                $('.loading-progress').attr('style', 'width:100%')
                clearInterval(progressInterval)
                setTimeout(() => {
                    $('.loading-outline').removeClass('active')
                    $('.loading-progress').removeClass('active')
                }, 200);
                $('.btn-answer').removeClass('active')
                $('.btn-answer').removeAttr('disabled')
                $('#question').html(data.no+'. '+data.gejala)
                $('#no').val(data.no)
                $('#premis').val(data.premis)
                
            }
        }
    })
})

$('#repeat-analisa').on('click', function(){
    $('#form-repeat').submit()
})