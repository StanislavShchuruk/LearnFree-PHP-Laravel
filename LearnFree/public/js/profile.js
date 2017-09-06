"use strict";

var territoryPlaceSelect;
var selectedTerritoryPlaceId;

main();

function main(){
    $('#countries').bind({change : getRegions});
    $('#regions').bind({change : getCities});
    setDateSelects();
    getCountries();
}



function setDateSelects(){
    //days
    var selectedDay = $('#selected-day-of-birth')[0].value;
    for(var i = 1; i < 32; i++){
        var optionItem = document.createElement('option');
        optionItem.innerHTML = i;
        optionItem.value = i;
        if(i == selectedDay) optionItem.selected = true;
        $('#days').append(optionItem);
    }
    //years
    var selectedYear = $('#selected-year-of-birth')[0].value;
    var maxYear = new Date().getFullYear() - 4;
    for(var i = maxYear; i > 1900; i--){
        var optionItem = document.createElement('option');
        optionItem.innerHTML = i;
        optionItem.value = i;
        if(i == selectedYear) optionItem.selected = true;
        $('#years').append(optionItem);
    }
    //monthes
    var selectedMonth = $('#selected-month-of-birth')[0].value;
    var monthes = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
    for(var i = 0; i < monthes.length; i++){
        var optionItem = document.createElement('option');
        optionItem.innerHTML = monthes[i];
        optionItem.value = (i + 1);
        if((i + 1) == selectedMonth) optionItem.selected = true;
        $('#monthes').append(optionItem);
    }
}

function getCountries(){
    territoryPlaceSelect = $('#countries');
    selectedTerritoryPlaceId = $('#selected-country-id')[0].value;
    appAjaxRequest("/countries", "GET").done(function(response){
        $.when(onGetOptionItemsDone(response)).then(getRegions());
    });
}

function getRegions(){
    territoryPlaceSelect = $('#regions');
    selectedTerritoryPlaceId = $('#selected-region-id')[0].value;
    territoryPlaceSelectCleare($('#cities'));
    var data = { country_id : $('#countries')[0].value };
    appAjaxRequest("/regions", "GET", data).done(function(response){
        $.when(onGetOptionItemsDone(response)).then(getCities());
    });
}

function getCities(){
    territoryPlaceSelect = $('#cities');
    selectedTerritoryPlaceId = $('#selected-city-id')[0].value;
    var data = { region_id : $('#regions')[0].value };
    appAjaxRequest("/cities", "GET", data).done(onGetOptionItemsDone);
}

function onGetOptionItemsDone(response){
    if(selectedTerritoryPlaceId == "") selectedTerritoryPlaceId = null;
    territoryPlaceSelectCleare(territoryPlaceSelect);
    for(var i = 0; i < response.length; i++){
        var optionItem = document.createElement('option');
        optionItem.innerHTML = response[i].name;
        optionItem.value = response[i].id;
        if(response[i].id == selectedTerritoryPlaceId) optionItem.selected = true;
        territoryPlaceSelect.append(optionItem);
    }
}

function territoryPlaceSelectCleare(select){
    select.empty();
    var optionItem = document.createElement('option');
    optionItem.innerHTML = '--';
    optionItem.value = -1;
    select.append(optionItem);
}


