const DEBUG = false

// Check used numbers inside a block
const GetUsedNumbersInBlock = (block_id, block_used_numbers) => {
    // Get all existing numbers inside the 9x9 block (these numbers cannot be used)
    const BLOCK_used_numbers = []

    jQuery.each(block_used_numbers, (index, num) => {
        if (num) BLOCK_used_numbers.push(num)
    });
    if (DEBUG) console.log(`In 9x9 block: ${BLOCK_used_numbers}`)
    return BLOCK_used_numbers
};


/*
------ [ GetUsedNumbersInBlock ] ------
Example: Here is a block that contains numbers

    0, 0, 0,
    6, 8, 0,
    1, 9, 0,

The script will extract used numbers inside the block.
Output => 6,8,1,9


------ [ GetUsableNumbersBlock ] ------
The used numbers are : 6,8,1,9
This script will get the usable numbers from (1, 2, 3, 5, 6, 7, 8, 9)
Output => 2,3,4,5,7
 */

// Get usable numbers inside a block
const GetUsableNumbersBlock = (allowed_numbers, used_numbers) => {
    const allowed_after_checking_block = []
    jQuery.each(allowed_numbers, (index, num) => {
        if(jQuery.inArray(num, used_numbers) === -1) allowed_after_checking_block.push(num)
    });
    if (DEBUG) console.log(`Available to use: ${allowed_after_checking_block}`)
    return allowed_after_checking_block
}

export {GetUsedNumbersInBlock, GetUsableNumbersBlock}
