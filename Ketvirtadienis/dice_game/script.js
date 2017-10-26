window.addEventListener( 'DOMContentLoaded', function () {

     buttonRoolDice = document.getElementById( 'roleDice' );

    function rollDice () {

         diceSide1 = document.getElementById( 'firstDice' );
         diceSide2 = document.getElementById( 'secondDice' );
         diceSide3 = document.getElementById( 'thirdDice' );
            status = document.getElementById( 'status' );

         side1 = Math.floor( Math.random() * 6 ) + 1;
         side2 = Math.floor( Math.random() * 6 ) + 1;
         side3 = Math.floor( Math.random() * 6 ) + 1;

        diceSide1.innerHTML = side1;
        diceSide2.innerHTML = side2;
        diceSide3.innerHTML = side3;
        diceTotal = side1 + side2 + side3;

        status.innerHTML = diceTotal;

    }

    buttonRoolDice.addEventListener( 'click', rollDice, false );

}, false);