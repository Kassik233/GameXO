/**
 *Assigning_a_number - функция которая сетает в массив состояние клетки
 * @param {string} XON  - класс конкретной клетки
 */
let position = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0]; // Пики

const Assigning_a_number = (XON) => {
    const number = XON.slice(-1) -1;
    position[9] = number;
    // console.log(position);
    fetch(`http://lernbackend.log/run.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(position)
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            console.log(data.response)
            position = data.response;
            console.log(position[11])
            for (let i = 1; i<10; i++) {
                let search = `.XO${i}`;
                let classForCraft = document.querySelector(`${search}`);
                if(position[i-1] === 3) {
                    classForCraft.classList.add('X')
                    classForCraft.classList.remove('XO')
                    classForCraft.classList.add('block')
                } else if (position[i - 1] === 4) {
                    classForCraft.classList.add('O')
                    classForCraft.classList.remove('XO')
                    classForCraft.classList.add('block')
                }
            }
            if (position[11] === 1) {
                document.querySelectorAll('.popup-title1, .popup, .popup-content').forEach((elem) => {
                    elem.classList.add('open')
                })
            } else if (position[11] === 2) {
                document.querySelectorAll('.popup-title2, .popup, .popup-content').forEach((elem) => {
                    elem.classList.add('open')
                })
            } else if (position[11] === 3) {
                document.querySelectorAll('.popup-title3, .popup, .popup-content').forEach((elem) => {
                    elem.classList.add('open')
                })
            }
            // console.log(data);
        });

}

document.querySelectorAll('.XO').forEach((elem) => {

        elem.addEventListener('click', function (event) {
            const className = event.target.classList[0]
            if (elem.classList.contains('block') === false) {
            Assigning_a_number(className);
        }
        })


})


//------получение данных дальше