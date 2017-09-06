
function appAjaxRequest(url, method, data, contentType, processData, dataType) {
    if (method === undefined) method = "POST";
    if (data === undefined) data = null;
    if (contentType === undefined) contentType = "application/json";
    if (processData === undefined) processData = true;
    if (dataType === undefined) dataType = "json";
    return $.ajax({
        url: url,
        data: data,
        contentType: contentType,
        processData: processData,
        dataType: dataType,
        method: method
    });
}

function onFailCommon(error) {
    alert('operation was failed. Error: ' + error.statusText + ' ' + error.status);
}


