import {Demo1, Demo2}  from './Demo.js';
import { GetRowNumbers } from './GetRowNumbers.js';
import { GetColNumbers } from './GetColNumbers.js';
import {GetUsedNumbersInBlock, GetUsableNumbersBlock}  from './GetBlockNumbers.js';

const allowed_numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9]

let possible = [] // Store possible numbers
let numbers = [
    // 0
    [
        0, 0, 0,
        6, 8, 0,
        1, 9, 0,
    ],
    // 1
    [
        2, 6, 0,
        0, 7, 0,
        0, 0, 4,
    ],
    // 2
    [
        7, 0, 1,
        0, 9, 0,
        5, 0, 0,
    ],
    // 3
    [
        8,  2,  0,
        0,  0,  4,
        0,  5,  0,
    ],
    // 4
    [
        1,  0,  0,
        6,  0,  2,
        0,  0,  3,
    ],
    // 5
    [
        0,  4,  0,
        9,  0,  0,
        0,  2,  8,
    ],
    // 6
    [
        0,  0,  9,
        0,  4,  0,
        7,  0,  3
    ],
    // 7
    [
        3,  0,  0,
        0,  5,  0,
        0,  1,  8,
    ],
    // 8
    [
        0,  7,  4,
        0,  3,  6,
        0,  0,  0,
    ]
]

function resetNumbers() {
    numbers = [
        // 0
        [
            0, 0, 0,
            0, 0, 0,
            0, 0, 0,
        ],
        // 1
        [
            0, 0, 0,
            0, 0, 0,
            0, 0, 0,
        ],
        // 2
        [
            0, 0, 0,
            0, 0, 0,
            0, 0, 0,
        ],
        // 3
        [
            0,  0,  0,
            0,  0,  0,
            0,  0,  0,
        ],
        // 4
        [
            0,  0,  0,
            0,  0,  0,
            0,  0,  0,
        ],
        // 5
        [
            0,  0,  0,
            0,  0,  0,
            0,  0,  0,
        ],
        // 6
        [
            0,  0,  0,
            0,  0,  0,
            0,  0,  0,
        ],
        // 7
        [
            0,  0,  0,
            0,  0,  0,
            0,  0,  0,
        ],
        // 8
        [
            0,  0,  0,
            0,  0,  0,
            0,  0,  0,
        ]
    ]
}

function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    return ((millis % 60000) / 1000).toFixed(0);
}


$('#solve').click(() => {
    resetNumbers()
    const num_of_tries = $('#num_of_tries option:selected').val();

    // Store user numbers input into array
    $('input').each(function(i, e) {
        const cell_id = e.id
        const cell_XY = $(`#${cell_id}`).attr('xy') // Get cell X,Y
        let cell_val = $(`#${cell_id}`).val() // Get cell value
        const cell_X = cell_XY.split(",")[0] // Get cell X
        const cell_Y = cell_XY.split(",")[1] // Get cell Y

        if (!cell_val) cell_val = 0
        numbers[cell_X][cell_Y] = parseInt(cell_val)
    })

    // Solve puzzle
    const start_time = performance.now();
    for (let i = 0; i < num_of_tries; i++) {
        $('input').each(function(i, elm) {
            const cell_id = elm.id
            const cell_value = elm.value

            if (cell_value) return 0
            // const cell_id = 'cell-0'

            const cell = $(`#${cell_id}`)
            const cell_val = cell.val() // Get cell number
            const cell_blockID = cell.attr('block') // Get cell 9x9 block number
            const cell_row = cell.attr('row') // Get cell row
            const cell_col = cell.attr('col') // Get cell column
            const cell_XY = cell.attr('xy') // Get cell X,Y
            const cell_X = cell_XY.split(",")[0] // Get cell X
            const cell_Y = cell_XY.split(",")[1] // Get cell Y

            const used_numbers_in_block = GetUsedNumbersInBlock(cell_blockID, numbers[cell_blockID]) // Get used numbers in block
            const usable_numbers_in_block = GetUsableNumbersBlock(allowed_numbers, used_numbers_in_block) // Get usable numbers in block
            const numbers_in_row = GetRowNumbers(cell_row, numbers) // Get all numbers in the row
            const numbers_in_col = GetColNumbers(cell_col, numbers) // Get all numbers in the column

            let usable_numbers_ROW_CLEARED = [] // Store usable numbers after doing ROW CHECK
            let usable_numbers_COL_CLEARED = [] // Store usable numbers after doing COL CHECK

            console.log(`Usable Numbers: ${usable_numbers_in_block}`)
            console.log(`Numbers in row: ${numbers_in_row}`)
            console.log(`Numbers in col: ${numbers_in_col}`)
            console.log('')


            // Filter usable numbers with the row numbers (Get only usable numbers after doing ROW CHECK)
            jQuery.each(usable_numbers_in_block, function(i, usable_number) {
                if(jQuery.inArray(usable_number, numbers_in_row) === -1) {
                    usable_numbers_ROW_CLEARED.push(usable_number)
                }
            });

            // Filter usable numbers with the column numbers (Get only usable numbers after doing COL CHECK)
            jQuery.each(usable_numbers_ROW_CLEARED, function(i, usable_number) {
                if(jQuery.inArray(usable_number, numbers_in_col) === -1) {
                    usable_numbers_COL_CLEARED.push(usable_number)
                }
            });
            console.log(`Usable Numbers [ROW CLEARED]: ${usable_numbers_ROW_CLEARED}`)
            console.log(`Usable Numbers [COL CLEARED]: ${usable_numbers_COL_CLEARED}`)
            console.log(`Block: ${cell_blockID} | Col: ${cell_col} | Row: ${cell_row} | Value: ${cell.val()} | X: ${cell_X} | Y: ${cell_Y}`)

            // Check if there is only one possible => apply changes in main numbers array
            if (usable_numbers_COL_CLEARED.length === 1) {
                numbers[cell_X][cell_Y] = parseInt(usable_numbers_COL_CLEARED)

                // Store possible numbers
                possible[cell_id] = usable_numbers_COL_CLEARED
                $(`#${cell_id}`).val(usable_numbers_COL_CLEARED)
            }
        });
    }
    const end_time = performance.now();
    const time_took_ms = (end_time - start_time).toFixed(2)
    const time_took_seconds = millisToMinutesAndSeconds(time_took_ms)
    $('#time_took').html(`${time_took_ms} ms | ${time_took_seconds} seconds`)
})

$('#clear').click(() => {
    $('input').val('');
    $('input').css('background', '#fff');
    numbers = []
})


$('input').on('input', (e) => {
    const cell_id = e.target.id
    const cell_XY = $(`#${cell_id}`).attr('xy') // Get cell X,Y
    const cell_val = $(`#${cell_id}`).val() // Get cell value
    const cell_X = cell_XY.split(",")[0] // Get cell X
    const cell_Y = cell_XY.split(",")[1] // Get cell Y

    // If enters more than 1 character => get the first character only
    if (cell_val.length > 1) $(`#${cell_id}`).val(cell_val.substring(0, 1))

    // Accept numbers only
    if (cell_val.replace(/[^0-9]/g,'')) {
        $(`#${cell_id}`).val(cell_val)
        if (cell_val) $(e.target).css('background', '#d7d7d7')
    }
    else {
        $(`#${cell_id}`).val('')
        $(e.target).css('background', '#fff')
    }
})


$('#entry_type').on('change', (e) => {
    const type = e.target.value

    if (type === 'manual') $('#clear').click()
    else if (type === 'demo1') {
        $('#clear').click()
        Demo1()
    }
    else if (type === 'demo2') {
        $('#clear').click()
        Demo2()
    }
})

$('input').each(function(i, e) {
    const cell_id = e.id
    const cell_val = $(`#${cell_id}`).val() // Get cell value

    if (cell_val) $(`#${cell_id}`).css('background', '#d7d7d7')
})
