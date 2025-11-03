<style>
    /* accent colors */
    :root {
        --accent: gold;
        --bg: black;
    }

    /* to shut up red non-https warning */
    body > div[style] {
        display: none !important;
    }


    /* thin dark scrollbar */
    /* Chrome, Edge, Safari */
    ::-webkit-scrollbar{width:8px;height:8px}
    ::-webkit-scrollbar-track{background:transparent}
    ::-webkit-scrollbar-thumb{background:rgba(100,100,100,0.6);border-radius:999px;border:2px solid transparent;background-clip:padding-box}
    ::-webkit-scrollbar-thumb:hover{background:rgba(100,100,100,0.8)}
    /* Firefox */
    *{scrollbar-width:thin;scrollbar-color:rgba(100,100,100,0.6) transparent}


    @keyframes blink{0%,49%{opacity:0}50%,100%{opacity:1}}

    /* input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        cursor: pointer;
    } */

    .no-image {
        position: relative;
        transform: skew(-10%);
    }
    .no-image::after {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-image: repeating-linear-gradient(
            -45deg,
            #555,
            #666 70px,
            transparent 70px,
            transparent 140px
        );
        pointer-events: none;
    }

    main {
        position: relative;
    }
    main:after {
        content: '';
        /* background: url('https://c.tenor.com/8Vs5VB1cnW4AAAAC/rain.gif') 0 0 / cover no-repeat; */
        /* background: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fgiffiles.alphacoders.com%2F182%2F18207.gif&f=1&nofb=1&ipt=182c1f4af43fd2e2d7067ccdee2d24b556bc5d9c5ab409015fb401b452d6e0f8') 0 0 / cover no-repeat; */
        background: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fgiffiles.alphacoders.com%2F105%2F105463.gif&f=1&nofb=1&ipt=af31aba952e3dc2a1f89b185ed2511e90c7d8fa29e87034475befd1acc744ec8') 0 0 / cover no-repeat;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        filter: brightness(70%) contrast(120%) blur(2px);
    }

</style>