<!-- @if(str_contains(request()->url(), 'admin'))
      @else
   
@endif  -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404</title>
</head>

<style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;500&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #faca2e;
        --eye-pupil-color: #050505;
        --bg-color: #fff;
        --text-color: #000;
        --fs-heading: 36px;
        --fs-text: 26px;
        --fs-button: 18px;
        --fs-icon: 30px;
        --pupil-size: 30px;
        --eye-size: 80px;
        --button-padding: 15px 30px;
    }

    @media only screen and (max-width: 567px) {
        :root {
            --fs-heading: 30px;
            --fs-text: 22px;
            --fs-button: 16px;
            --fs-icon: 24px;
            --button-padding: 12px 24px;
        }
    }

    body {
        display: flex;
        min-height: 100vh;
        background-color: var(--bg-color);
        color: var(--text-color);
        font-family: "Fira Sans", sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        row-gap: 30px;
        text-align: center;
    }

    .error-page {
        margin: auto;
    }

    .error-page__heading-title {
        text-transform: capitalize;
        font-size: var(--fs-heading);
        font-weight: 500;
        color: var(--primary-color);
    }

    .error-page__heading-desciption {
        margin-top: 10px;
        font-size: var(--fs-text);
        font-weight: 200;
    }

    .error-page__button {
        color: inherit;
        text-decoration: none;
        border: 1px solid var(--primary-color);
        font-size: var(--fs-button);
        font-weight: 200;
        padding: var(--button-padding);
        border-radius: 15px;
        box-shadow: 0px 7px 0px -2px var(--primary-color);
        transition: all 0.3s ease-in-out;
        text-transform: capitalize;
    }

    .error-page__button:hover {
        box-shadow: none;
        background-color: var(--primary-color);
        color: #fff;
    }

    .eyes {
        display: flex;
        justify-content: center;
        gap: 2px;
    }

    .eye {
        width: var(--eye-size);
        height: var(--eye-size);
        background-color: var(--primary-color);
        border-radius: 50%;
        display: grid;
        place-items: center;
    }

    .eye__pupil {
        width: var(--pupil-size);
        height: var(--pupil-size);
        background-color: var(--eye-pupil-color);
        border-radius: 50%;
        animation: movePupil 2s infinite ease-in-out;
        transform-origin: center center;
        /*
  To reverse the animation of the right eye, uncomment this.
  */
    }

    @keyframes movePupil {

        0%,
        100% {
            transform: translate(0, 0);
        }

        25% {
            transform: translate(-10px, -10px);
        }

        50% {
            transform: translate(10px, 10px);
        }

        75% {
            transform: translate(-10px, 10px);
        }
    }

    .color-switcher {
        position: fixed;
        top: 40px;
        right: 40px;
        background-color: transparent;
        font-size: var(--fs-icon);
        cursor: pointer;
        color: var(--primary-color);
        border: 0;
    }
</style>

<body>






    <main class="error-page">
        <div class="container">
            <div class="eyes">
                <div class="eye">
                    <div class="eye__pupil eye__pupil--left"></div>
                </div>
                <div class="eye">
                    <div class="eye__pupil eye__pupil--right"></div>
                </div>
            </div>

            <div class="error-page__heading">
                <h1 class="error-page__heading-title">Looks like you're lost</h1>
                <p class="error-page__heading-desciption">404 error</p>
            </div>


        </div>
        </div>

        <button class="color-switcher" data-theme-color-switch>&#127769;</button>


</body>

<script type="text/javascript">
    /* 
To Customize Theme Color
*/

    const colorSwitcher = document.querySelector("[data-theme-color-switch]");
    let currentTheme = "light";

    colorSwitcher.addEventListener("click", function() {
        const root = document.documentElement;

        if (currentTheme == "dark") {
            root.style.setProperty("--bg-color", "#fff");
            root.style.setProperty("--text-color", "#000");
            colorSwitcher.textContent = "\u{1F319}";
            currentTheme = "light";
        } else {
            root.style.setProperty("--bg-color", "#050505");
            root.style.setProperty("--text-color", "#fff");
            colorSwitcher.textContent = "\u{2600}";
            currentTheme = "dark";
        }

        colorSwitcher.setAttribute("data-theme", currentTheme);
    });
</script>

</html>