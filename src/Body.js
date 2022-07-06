import React from 'react';
import './Body.css';
import  Header  from './Header';
import { useDataLayerValue } from './DataLayer';
import { Favorite, MoreHoriz, PlayCircleFilled } from '@mui/icons-material';
import  SongRow  from './SongRow';

 function Body({spotify}) {
        const[{discover_weekly},dispatch]=useDataLayerValue();
        const playPlaylist = (id) => {
            spotify
              .play({
                context_uri: `spotify:playlist:1SFQRYP4mL5vF3BxT68nxm`,
              })
              .then((res) => {
                spotify.getMyCurrentPlayingTrack().then((r) => {
                  dispatch({
                    type: "SET_ITEM",
                    item: r.item,
                  });
                  dispatch({
                    type: "SET_PLAYING",
                    playing: true,
                  });
                });
              });
          };
          const playSong = (id) => {
            spotify
              .play({
                uris: [`spotify:track:${id}`],
              })
              .then((res) => {
                spotify.getMyCurrentPlayingTrack().then((r) => {
                  dispatch({
                    type: "SET_ITEM",
                    item: r.item,
                  });
                  dispatch({
                    type: "SET_PLAYING",
                    playing: true,
                  });
                });
              });
          };
    return (
        <div className="body">
               <Header spotify={spotify}/>

               <div className="body_info">
                   <img
                   src={discover_weekly?.images[0].url}
                   alt=""
                   />
                   <div className="body_infoText">
                    <strong>PLAYLIST</strong>
                    <h2>Dicover Weekly</h2>
                    <p> {discover_weekly?.description}</p>
                   </div>
                   </div>

                   <div className="body_songs">
                       <div className="body_icons">
                           <PlayCircleFilled className="body_shuff"onClick={playPlaylist}/>
                           <Favorite className="large"/>
                           <MoreHoriz/>
                       </div>
                       {/* list of songs */}
                       {discover_weekly?.tracks.items.map((item)=>(
                           <SongRow playSong={playSong} track={item.track}/>
                       ))}

                   </div>
        </div>
    )
}
export default Body;
