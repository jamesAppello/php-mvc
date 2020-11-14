

let para = document.createElement('p');
let ipt_value;
const sub_btn = document.getElementById('subBtn');
let ipt1 = document.getElementById('idxIpt');
ipt1.addEventListener('click', function (e) {
    e.target.value = "";
    ipt1.addEventListener('keypress', function(e1) {
        ipt_value = e1.target.value + "";
        return ipt_value;
    });
    sub_btn.addEventListener('click', function(e2) {
        e2.preventDefault();
        let splVal = ipt_value.split('');
        let sL = splVal.length;
        let result;
        let holder = [];
        for (let i = sL; i > 0; i--) {
            const rng = Math.floor( 
                (Math.random() * ( (1/(1010*(sL)))*(2/3) )) 
            );
            let temp = splVal[i];
            splVal[i] = splVal[rng];
            splVal[rng] = temp;
            let tg = splVal.join('');
            holder.push(tg);
            let hl = holder.length;
            for (let j = hl - 2; j> 0; j--) {
                const rng2 = Math.floor( 
                    (Math.random() * ( (1/Math.cos(j))*(Math.sin(j)) )) 
                );
                let thisTmp = splVal[j];
                splVal[j] = splVal[rng2];
                splVal[rng2] = thisTmp;
                result = holder.slice(holder[i+5+j-6]);
            }
        }
        document.getElementById('shdr').toggleAttribute('hidden', false);
        document.getElementById('txthere').innerHTML = result[result.length-4];
    });
});
