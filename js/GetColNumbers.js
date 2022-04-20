const DEBUG = false

// Check all column numbers
export function GetColNumbers(col_num, numbers) {
    if (DEBUG) console.log(`Col number: ${col_num}`)

    // Get needed cells to check their numbers
    let wanted_cells = []
    if (col_num === '0' || col_num === '1' || col_num === '2') wanted_cells = [0, 3, 6]
    else if (col_num === '3' || col_num === '4' || col_num === '5') wanted_cells = [1, 4, 7]
    else if (col_num === '6' || col_num === '7' || col_num === '8') wanted_cells = [2, 5, 8]

    let block_indexes = []
    if (col_num === '0' || col_num === '3' || col_num === '6') block_indexes = [0, 3, 6]
    else if (col_num === '1' || col_num === '4' || col_num === '7') block_indexes = [1, 4, 7]
    else if (col_num === '2' || col_num === '5' || col_num === '8') block_indexes = [2, 5, 8]

    const col_numbers = []
    jQuery.each(wanted_cells, function(i, cellID) {
        col_numbers.push(numbers[cellID][block_indexes[0]])
        col_numbers.push(numbers[cellID][block_indexes[1]])
        col_numbers.push(numbers[cellID][block_indexes[2]])
    });


    if (DEBUG) console.log(`Column Numbers: ${col_numbers}`)

    // Remove zeros from array
    let col_numbers_no_zeros
    col_numbers_no_zeros = jQuery.grep(col_numbers, function(value) {
        return value !== 0;
    });

    return col_numbers_no_zeros
};
