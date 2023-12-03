import React from 'react';
import { Dropdown } from 'react-bootstrap';

function MusicDropdown(props){
    const adicionarNaPlaylist = (nome, artista)=>{
        console.log(`${nome} - ${artista}`);
    }
    return (
        <Dropdown>
            <Dropdown.Toggle variant="secondary" id="dropdown-basic">
                ...
            </Dropdown.Toggle>

            <Dropdown.Menu>
                <Dropdown.Item href="#">Reproduzir música</Dropdown.Item>
                <Dropdown.Item href="#" onClick={()=>{adicionarNaPlaylist(props.nome, props.artista)}}>Adicionar à playlist</Dropdown.Item>
                <Dropdown.Item href="#">Curtir música</Dropdown.Item>
            </Dropdown.Menu>
        </Dropdown>
    );
}

export default MusicDropdown;