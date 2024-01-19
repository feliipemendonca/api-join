function get(url, parameters) {
    return new Promise((resolver, reject) => {
        $.ajax({
            url: url,
            data: parameters,
            dataType: 'json',
            success: (response) => {
                resolver(response);
            },
            error: (error) => {
                reject(error);
            }
        })
    })
}

function post(url, parameters) {
    return new Promise((resolver, reject) => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            data: parameters,
            dataType: 'json',
            success: (reponse) => {
                resolver(response);
            },
            error: (error) => {
                reject(error);
            }
        })
    })
}

function destroy(url, parameters) {
    return new Promise((resolver, reject) => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'DELETE',
            data: parameters,
            dataType: 'json',
            success: (response) => {
                resolver(response);
            },
            error: (error) => {
                reject(error);
            }
        })
    })
}

export default {
    get, post, destroy
}