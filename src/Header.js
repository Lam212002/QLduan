import { Search } from '@mui/icons-material'
import React from 'react'
import './Header.css'
import { Avatar } from '@mui/material';
import { useDataLayerValue } from './DataLayer';
 function Header() {
    
    const [{ user }, dispatch] = useDataLayerValue();
    
    return (
        <div className="header">
          <div className="header_left">
            <Search />
            <input
              placeholder="Search for Artists, Songs, or Podcasts "
              type="text"
            />
          </div>
          <div className="header_right">
          <Avatar alt={user?.display_name} src={user?.images[0]?.url} />
        <h4>{user?.display_name}</h4>
          </div>
        </div>
      );
    }
    export default Header;