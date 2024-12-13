
    
    <dialog id="modal" open> 
        
        <p>Товар обновлен</p>
        <br>
        <button id="closeBtn">Ок</button>
    </dialog>

    <script>
        openBtn.addEventListener("click", ()=>{
            modal.showModal();
        })
        closeBtn.addEventListener("click", ()=>{
            modal.close();
        })
    </script>
