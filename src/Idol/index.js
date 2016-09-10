import React, { Component } from 'react';

import './index.css';

class Idol extends Component {
	render() {
		return (
			<div className="idol__area">
				<a href={ this.props.link } title={ `${this.props.name} - ${ this.props.group }` } className="idol">
					<img src={ this.props.image } alt={ `${this.props.name} - ${ this.props.group }` } style={{ borderColor: this.props.color }} />
					<div className="idol--info__area">
						<div className="idol--info">
							<p>{ this.props.name }<br />{ this.props.group }</p>
						</div>
					</div>
				</a>
			</div>
		);
	}
}

export default Idol; //eslint-disable-line
