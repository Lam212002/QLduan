import React from 'react';
import {useEffect,useState} from 'react';
import {useDataLayerValue} from "./DataLayer"
import './Footer.css';
import { PauseCircleOutline, PlayCircleOutline, PlaylistPlay, VolumeDown } from '@mui/icons-material';
import { SkipPrevious } from '@mui/icons-material';
import { SkipNext } from '@mui/icons-material';
import { Shuffle } from '@mui/icons-material';
import { Repeat } from '@mui/icons-material';
import { Grid, Slider } from '@mui/material';
 function Footer({spotify}) {
    const [{ token, item, playing }, dispatch] = useDataLayerValue();

  useEffect(() => {
    spotify.getMyCurrentPlaybackState().then((r) => {
    //   console.log(r);

      dispatch({
        type: "SET_PLAYING",
        playing: r.is_playing,
      });

      dispatch({
        type: "SET_ITEM",
        item: r.item,
      });
    });
  }, [spotify]);
  const handlePlayPause = () => {
    if (playing) {
      spotify.pause();
      dispatch({
        type: "SET_PLAYING",
        playing: false,
      });
    } else {
      spotify.play();
      dispatch({
        type: "SET_PLAYING",
        playing: true,
      });
    }
  };
  const skipNext = () => {
    spotify.skipToNext();
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
  };
    
  const skipPrevious = () => {
    spotify.skipToPrevious();
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
  };
    return (
        <div className="footer">
           <div className="footer_left">
             <img
             className="footer_albumLogo" 
             src={item?.album.images[0].url}
             alt={item?.name}
             />
             {item ? (
             <div className="footer_songInfo">
            <h4>{item.name}</h4>
            <p>{item.artists.map((artist) => artist.name).join(", ")}</p>
             </div>
             ):(
                <div className="footer_songInfo">
                <h4>No song is playing</h4>
                <p>...</p>
              </div>
            )}
           </div>
           <div className="footer_center">
           <Shuffle className="footer_green"/>
          <SkipPrevious onClick={skipNext}  className="footer_icon"/>
          {playing ? (
          <PauseCircleOutline 
          onClick={handlePlayPause}
           fontSize="large"
            className="footer_icon"
            />
          ) : (
            <PlayCircleOutline
            onClick={handlePlayPause}
            fontSize="large"
            className="footer__icon"
          />
        )}
          <SkipNext  onClick={skipPrevious} className="footer_icon"/>
          <Repeat className="footer_green"/>
           </div>
           <div className="footer_right">
            <Grid container spacing={2}>
            <Grid item>
            <PlaylistPlay/>
            </Grid>
            <Grid item>
            <VolumeDown/>
            </Grid>
            <Grid item xs>
            <Slider aria-labelledby="continuous-slider" />
            </Grid>
            </Grid>
           </div>
        </div>
    );
}
export default Footer;
