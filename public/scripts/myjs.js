console.log("Running my js");

// $(".is-heard").change((ev) => console.log("Changed checbox"));

const cboxes = document.getElementsByClassName("is-heard");
for (let cbox of cboxes) {
    cbox.onchange = (ev) => {
        const granny = cbox.parentNode.parentNode;
        console.log(ev.currentTarget.checked);
        if (ev.currentTarget.checked) {
            granny.classList.add("heard-song");
        } else {
            granny.classList.remove("heard-song");
        }
        //gather all values and make a post request to update serverside
        const trackName = cbox.parentNode.querySelector(".track-name").value;
        const artistName = cbox.parentNode.querySelector(".artist-name").value;
        const id = cbox.parentNode.querySelector(".update-song").value;
        console.log(
            "ready to send",
            ev.currentTarget.checked,
            trackName,
            artistName,
            id
        );
        //TODO use fetch instead if we are not using jQuery
        //https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch#Supplying_request_options
        if (ev.currentTarget.checked) {
            $.post("updateSong.php", {
                isHeard: ev.currentTarget.checked,
                trackName: trackName,
                artistName: artistName,
                updateSong: id,
            });
        } else {
            $.post("updateSong.php", {
                trackName: trackName,
                artistName: artistName,
                updateSong: id,
            });
        }

        // .done(function( data ) {
        //     alert( "Data Loaded: " + data );
        // });
    };
}
