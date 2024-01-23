import {React, useState} from 'react';
import { Dropdown } from 'react-bootstrap';
import Modal from "react-modal";

import SearchPlaylistModal from '../SearchPlaylistModal/SearchPlaylistModal';


Modal.setAppElement("#root");

function MusicDropdown(props){
    const [modalIsOpen, setIsOpen] = useState(false);

    function handleOpenModal(){
        setIsOpen(true);
    }

    function handleCloseModal(){
        setIsOpen(false);
    }
    

    const customStyles = {
        content: {
            top: "50%",
            left: "50%",
            right: "auto",
            bottom: "auto",
            marginRight: "-50%",
            transform: "translate(-50%, -50%)",
            boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)", // Adiciona uma sombra
            borderRadius: "8px", // Borda arredondada
            background: "#D9D9D9", // Cor de fundo
            width: "600px",
            maxHeight: "300px",
          },
    };

    return (
        <Dropdown>
            <Dropdown.Toggle variant="secondary" id="dropdown-basic">
                ...
            </Dropdown.Toggle>

            <Dropdown.Menu>
                <Dropdown.Item href="#">Reproduzir música</Dropdown.Item>
                <Dropdown.Item href="#" onClick={handleOpenModal} data-toggle="modal" data-target="#ExemploModalCentralizado">Adicionar à playlist</Dropdown.Item>
                <Modal 
                    isOpen={modalIsOpen}
                    onRequestClose={handleCloseModal}
                    style={customStyles}
                >
                    <div>
                        <SearchPlaylistModal musica_id={props.musica_id}/>
                    </div>        
                </Modal>
                <Dropdown.Item href="#" ><span>curtir</span></Dropdown.Item>
            </Dropdown.Menu>
        </Dropdown>
    );
}

export default MusicDropdown;