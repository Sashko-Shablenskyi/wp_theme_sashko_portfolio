<?php
/*
    Template Name: Calculator JS
    Template post type: post
*/
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Poppins:regular,500&display=swap);

* {
    box-sizing: border-box;
}

:root {
    --bgColor: #EFE8DE;
    --bgCircleColor: #EEB767;
    --outputColor: #818181;
    --inputColor: #424242;
    --btnsColor: #d8d8d8;
    --btnsAccentBG: #FF9500;
}

.bacground {
    position: relative;
    width: 100vw;
    height: 100vh;
    background-color: var(--bgColor);
    overflow: hidden;
}

.bacground::after,
.bacground::before {
    position: absolute;
    content: '';
    display: block;
    background-color: var(--bgCircleColor);
    aspect-ratio: 1/1;
    border-radius: 50%;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
    z-index: 1;
}

.bacground::after {
    width: 40%;
    top: 0;
    right: 10%;
}

.bacground::before {
    width: 15%;
    bottom: 15%;
    left: 20%;
}

.calc {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 90%;
    width: 370px;
    padding: 33px;
    background: linear-gradient(167.27deg, #F7F8FB -5.94%, rgba(247, 248, 251, 0.19) 103.62%);
    backdrop-filter: blur(51px);
    border-radius: 39px;
    z-index: 5;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
}

.calc__screen {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 25%;
}

.calc__history {
    position: absolute;
    top: 0;
    left: 0;
    cursor: pointer;
}

.screen__input-field {
    color: var(--inputColor);
    font-size: 48px;
    line-height: 72px;
    word-spacing: -7px;
    white-space: nowrap;
    display: flex;
    justify-content: flex-end;
    overflow: hidden;
    border: none;
    background: transparent;
    text-align: right;
    caret-color: transparent;
}

.screen__input-field--active {
    color: var(--outputColor);
    font-weight: 400;
    font-size: 24px;
    line-height: 36px;
    transition: all .3s linear;
}

.screen__output-field {
    color: var(--outputColor);
    font-weight: 400;
    font-size: 24px;
    line-height: 36px;
    overflow: hidden;
    text-align: right;
}

.screen__output-field--active {
    color: var(--inputColor);
    font-size: 48px;
    line-height: 72px;
    word-spacing: -7px;
    white-space: nowrap;
    transition: all .3s linear;

}

.calc__btns {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 20px;
    height: 75%;
    padding: 70px 0 0;
    user-select: none;
}

.calc__btn {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(129.7deg, rgba(255, 255, 255, 0.6) -9.69%, rgba(255, 255, 255, 0.4) 114.23%);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 50%;
    aspect-ratio: 1/1;
    cursor: pointer;
    font-size: 32px;
    color: var(--btnsColor);
}

.calc__btn--click::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: block;
    background: rgba(0, 0, 0, 0.15);
    border-radius: 50%;
    animation: .5s btn-click;
}

.calc__btn--click-big::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: block;
    background: rgba(0, 0, 0, 0.15);
    border-radius: 27px;
    animation: .5s btn-click;
}

@keyframes btn-click {
    0% {
        width: 0;
        height: 0;
    }

    15% {
        width: 100%;
        height: 100%;
    }
}

.calc__btn i::before {
    display: flex;
    justify-content: center;
    align-items: center;
}

.calc__btn:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.45);
    transform: scale(1.1);
}

.clear {
    grid-area: 1/1/2/3;
    aspect-ratio: unset;
    border-radius: 27px;

}

.delete-last-char {
    grid-area: 1/3;
}

.division,
.multiplication,
.subtraction,
.addition,
.equels {
    background: var(--btnsAccentBG);
}

.division {
    grid-area: 1/4;
}

.multiplication {
    grid-area: 2/4;
}

.subtraction {
    grid-area: 3/4;
}

.addition {
    grid-area: 4/4;
}

.equels {
    grid-area: 5/3/6/5;
    border-radius: 27px;
    aspect-ratio: unset;
}

[data-btn-value='1'] {
    grid-area: 2/1;
}

[data-btn-value='2'] {
    grid-area: 2/2;
}

[data-btn-value='3'] {
    grid-area: 2/3;
}

[data-btn-value='4'] {
    grid-area: 3/1;
}

[data-btn-value='5'] {
    grid-area: 3/2;
}

[data-btn-value='6'] {
    grid-area: 3/3;
}

[data-btn-value='7'] {
    grid-area: 4/1;
}

[data-btn-value='8'] {
    grid-area: 4/2;
}

[data-btn-value='9'] {
    grid-area: 4/3;
}

[data-btn-value='0'] {
    grid-area: 5/1;
}
</style>

<div class="bacground">
    <div class="calc">
        <div class="calc__screen">
            <div class="calc__history">
                <img src="img/history-icon.svg" alt="history-icon">
            </div>
            <input class="screen__input-field"></input>
            <div class="screen__output-field"></div>
        </div>
        <div class="calc__btns"></div>
    </div>

    <script>
    'use strict';

    // -----RENDER-----

    const btnsWrapper = document.querySelector('.calc__btns');

    const btnsIconsArr = [
        'AC',
        '<i class="fa-solid fa-delete-left"></i>',
        '<i class="fa-solid fa-divide"></i>',
        '<i class="fa-solid fa-xmark"></i>',
        '<i class="fa-solid fa-minus"></i>',
        '<i class="fa-solid fa-plus"></i>',
        '<i class="fa-solid fa-equals"></i>',
        '.',
    ];

    const mathOperatorsArr = [
        'clear',
        'delete-last-char',
        'division',
        'multiplication',
        'subtraction',
        'addition',
        'equels',
        'dot',
    ];

    function renderBtns() {
        for (let i = 0; i < 18; i++) {
            switch (i < btnsIconsArr.length) {
                case true:
                    btnsWrapper.innerHTML +=
                        ` <div  class="calc__btn ${mathOperatorsArr[i]}" data-btn-value=${mathOperatorsArr[i]}> ${btnsIconsArr[i]} </div>`;
                    break;
                case false:
                    btnsWrapper.innerHTML += `
                <div  class="calc__btn" data-btn-value=${i - btnsIconsArr.length}> ${
                i - btnsIconsArr.length
                } </div>`;
                    break;
            }
        }
    }

    renderBtns();

    // -----LOGiC-----

    const btns = [...document.querySelectorAll('.calc__btn')],
        inputField = document.querySelector('.screen__input-field'),
        outputField = document.querySelector('.screen__output-field');

    inputField.focus();

    function undoFocusRemoval() {
        inputField.addEventListener('blur', (event) => {
            event.preventDefault();
            inputField.focus();
        });
    }

    undoFocusRemoval();

    btns.forEach((e) => {
        e.addEventListener('click', () => {
            choiseAction(e.dataset.btnValue);
            showClick(e);
        });
    });

    function choiseAction(value) {
        switch (value) {
            case 'clear':
                inputField.classList.remove('screen__input-field--active');
                outputField.classList.remove('screen__output-field--active');
                clearField();
                break;
            case 'delete-last-char':
                deleteLastChar();
                break;
            case 'percent':
                inputField.value += '%';
                break;
            case 'division':
                inputField.value += '/';
                break;
            case 'multiplication':
                inputField.value += '*';
                break;
            case 'subtraction':
                inputField.value += '-';
                break;
            case 'addition':
                inputField.value += '+';
                break;
            case 'dot':
                inputField.value += '.';
                break;
            case 'equels':
                inputField.classList.add('screen__input-field--active');
                outputField.classList.add('screen__output-field--active');
                calculateExpression();
                break;
            default:
                showExpression(value);
                break;
        }
    }

    function showExpression(e) {
        inputField.value += `${e}`;
    }

    function showResult(e) {
        outputField.innerHTML = `${e}`;
    }

    function clearField() {
        inputField.value = '';
        outputField.innerHTML = '';
    }

    function deleteLastChar() {
        const expression = inputField.value.slice(0, -1);
        inputField.value = `${expression}`;
    }

    function calculateExpression() {
        const expression = inputField.value;

        let moderatedStr = expression,
            muldiv = moderatedStr.match(/(\d+\.?\d*)([\/\*])(\d+\.?\d*)/);

        while (muldiv) {
            const [_, left, operator, right] = muldiv;
            let result;

            if (operator === '*') {
                result = parseFloat(left) * parseFloat(right);
            } else if (operator === '/') {
                result = parseFloat(left) / parseFloat(right);
            }

            moderatedStr = moderatedStr.replace(muldiv[0], result);
            muldiv = moderatedStr.match(/(\d+\.?\d*)([\/\*])(\d+\.?\d*)/);
        }

        const parts = moderatedStr.split(/([+\-])/);
        let result = parseFloat(parts[0]);

        for (let i = 1; i < parts.length; i += 2) {
            const operator = parts[i];
            const operand = parseFloat(parts[i + 1]);

            switch (operator) {
                case '+':
                    result += operand;
                    break;
                case '-':
                    result -= operand;
                    break;
            }
        }

        checkNaN(result);
    }

    function checkNaN(result) {
        if (isNaN(result)) {
            showResult('ERR');
        } else {
            showResult(result);
        }
    }

    function validateInput(input) {
        input.addEventListener('keypress', function(event) {
            const allowedKeys = /[0-9\/*+-]/;
            const char = String.fromCharCode(event.keyCode);

            if (!allowedKeys.test(char)) {
                event.preventDefault();
            }
        });
    }

    validateInput(inputField);

    // -----STYLES-----

    function showClick(e) {
        const btnValue = e.dataset.btnValue;

        if (btnValue != 'equels' && btnValue != 'clear') {
            e.classList.add('calc__btn--click');
        } else {
            e.classList.add('calc__btn--click-big');
        }

        setTimeout(function() {
            e.classList.remove('calc__btn--click');
            e.classList.remove('calc__btn--click-big');
        }, 250);
    }
    </script>
</div>