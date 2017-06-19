<style media="screen">
    $navbar-color: #3c3e42;

    /* universal */

    body {
    padding-top: 60px;
    }

    section {
    overflow: auto;
    }

    textarea {
    resize: vertical;
    }

    .jumbotron {
    text-align: center;
    }

    /* typography */

    h1, h2, h3, h4, h5, h6 {
    line-height: 1;
    }

    h1 {
    font-size: 3em;
    letter-spacing: -2px;
    margin-bottom: 30px;
    text-align: center;
    }

    h2 {
    font-size: 1.2em;
    letter-spacing: -1px;
    margin-bottom: 30px;
    text-align: center;
    font-weight: normal;
    color: #777;
    }

    p {
    font-size: 1.1em;
    line-height: 1.7em;
    }

    /* header */

    .navbar-inverse {
    background-color: $navbar-color;
    }

    #logo {
    float: left;
    margin-right: 10px;
    font-size: 1.7em;
    color: #fff;
    text-decoration: none;
    letter-spacing: -1px;
    padding-top: 9px;
    font-weight: bold;
    &:hover {
    color: #fff;
    }
    aside {
    section {
        padding: 10px 0;
        margin-top: 20px;
    &:first-child {
         border: 0;
         padding-top: 0;
     }
    span {
        display: block;
        margin-bottom: 3px;
        line-height: 1;
    }
    }
    }

    section.user_info {
        padding-bottom: 10px;
        margin-top: 20px;
        text-align: center;
    .gravatar {
        float: none;
        max-width: 70px;
    }
    h1 {
        font-size: 1.4em;
        letter-spacing: -1px;
        margin-bottom: 3px;
        margin-top: 15px;
    }
    }

    .gravatar {
        float: left;
        margin-right: 10px;
        max-width: 50px;
        border-radius: 50%;
    }

    #logout {
        cursor: default;
    &:hover {
         background-color: transparent;
     }
    }
</style>
