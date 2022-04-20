const DEBUG = false

// Check all row numbers
export function GetRowNumbers(row_num, numbers) {
    if (DEBUG) console.log(`Row number: ${row_num}`)

    // Get needed cells to check their numbers
    let wanted_cells = []
    if (row_num === '0' || row_num === '1' || row_num === '2') wanted_cells = [0, 1, 2]
    else if (row_num === '3' || row_num === '4' || row_num === '5') wanted_cells = [3, 4, 5]
    else if (row_num === '6' || row_num === '7' || row_num === '8') wanted_cells = [6, 7, 8]

    let block_indexes = []
    if (row_num === '0' || row_num === '3' || row_num === '6') block_indexes = [0, 1, 2]
    else if (row_num === '1' || row_num === '4' || row_num === '7') block_indexes = [3, 4, 5]
    else if (row_num === '2' || row_num === '5' || row_num === '8') block_indexes = [6, 7, 8]

    const row_numbers = []
    jQuery.each(wanted_cells, function(i, cellID) {
        row_numbers.push(numbers[cellID][block_indexes[0]])
        row_numbers.push(numbers[cellID][block_indexes[1]])
        row_numbers.push(numbers[cellID][block_indexes[2]])
    });

    if (DEBUG) console.log(`Row Numbers: ${row_numbers}`)

    // Remove zeros from array
    let row_numbers_no_zeros
    row_numbers_no_zeros = jQuery.grep(row_numbers, function(value) {
        return value !== 0;
    });

    return row_numbers_no_zeros
};
