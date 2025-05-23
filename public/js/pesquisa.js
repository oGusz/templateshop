$(window).load(function() {
    let listmap = [];
    $('#thumbSearch li').each(function() {
        listmap.push($(this));
    });

    $('#thumbSearch ul').empty();
    $(listmap).each(function() {
        $('#thumbSearch > ul ').append($(this));
        // $(this).wrap('<li></li>');
    });

    $('#thumbSearch').addClass('search-active');

    if($('.search-content i').length > 0){
        $('.search-content i').each(function(){
            let itemText = $(this).closest('a').attr('title');
            $(this).closest('a').html(itemText);
            $(this).remove();
        });
    }
    
    startSearch();
});

function startSearch() {
    return searchChart($('#inputSearch'), $('#thumbSearch li'));
}

function normalizeChart(str) {
    return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
}

function clearChart(str) {
    return str.replace(/\s+/g, ' ').toLowerCase();
}

function searchChart(search, div) {

    let rows = $(div), val = normalizeChart(clearChart(search.val()));

    rows.show().filter(function() {

        let text = normalizeChart(clearChart($(this).text()));

        let alink = $(this).children();

        let child = alink.find('#thumbSearch ul li a').attr('href');

        if (typeof child !== 'undefined') {
            text += clearChart(child);
        }
        
        return !~text.search(val);

    }).hide();

    countResults();
}

function clearSearch() {
    $('#thumbSearch ul li').show();
    $('#inputSearch').val('').focus();
}

function countResults() {
    let countResults = 0;

    document.querySelectorAll('#thumbSearch ul li').forEach(function(el) {
        let isShow = getComputedStyle(el).getPropertyValue('display');

        if(isShow != 'none') { countResults++; }
    });

    if(countResults == 0) { $('.no-results').show(); } 
    else { $('.no-results').hide(); } 
}