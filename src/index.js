import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import { Flex, Box } from 'reflexbox';

import './App.css';

import Idol from './Idol/index';

// Import Idol Images
import mirin from './Idol/idols/mirin.jpg';
import gumi from './Idol/idols/gumi.jpg';
import mahiru from './Idol/idols/mahiru.jpg';
import kanako from './Idol/idols/kanako.jpg';
import younapi from './Idol/idols/younapi.jpg';
import kaede from './Idol/idols/kaede.jpg';
import mirei from './Idol/idols/mirei.jpg';
import perorin from './Idol/idols/perorin.jpg';
import ayunid from './Idol/idols/ayunid.jpg';
import togaren from './Idol/idols/togaren.jpg';
import hitochibi from './Idol/idols/hitochibi.jpg';
import imai from './Idol/idols/imai.jpg';
import ayaka from './Idol/idols/ayaka.jpg';
import matsushitareona from './Idol/idols/matsushitareona.jpg';

import Masonry from 'react-masonry-component';
const masonryOptions = {
	transitionDuration: 0
};

class App extends Component {
	render() {
		return (
			<Flex className="App" p={2}>
				<Box col={8} md={9}>
					<Masonry
						className={'idols'}
						options={ masonryOptions }
					>
						<Idol name="Furukawa Mirin" group="Dempagumi.Inc" image={ mirin } link="https://twitter.com/FurukawaMirin" color="red" />
						<Idol name="Nanase Gumi" group="Band Ja Nai Mon" image={ gumi } link="https://twitter.com/gumi_nanase" color="aqua" />
						<Idol name="Hitochibi" group="uijin" image={ hitochibi } link="https://twitter.com/hitochibi_uijin" color="blue" />
					</Masonry>
					<hr />
					<Masonry
						className={'idols'}
						options={ masonryOptions }
					>
						<Idol name="Mahiru Kurumizawa" group="Moso Calibration" image={ mahiru } link="https://twitter.com/lunch_mahiru" color="pink" />
						<Idol name="Kanako Momota" group="Momoiro Clover" image={ kanako } link="http://ameblo.jp/momota-sd/" color="red" />
						<Idol name="Younapi" group="You'll Melt More" image={ younapi } link="https://twitter.com/mo_younapi" color="white" />
						<Idol name="Togaren" group="Zenbu Kimi No Sei Da" image={ togaren } link="https://twitter.com/zenkimi_togaren" color="pink" />
						<Idol name="Rin Kaname (Perorin)" group="ベボガ！" image={ perorin } link="https://twitter.com/peroperorinko01" color="yellow" />
						<Idol name="Ayaka" group="Lyrical School" image={ ayaka } link="https://twitter.com/ayaka831" color="blue" />
						<Idol name="Mai Imai" group="Musubizm" image={ imai } link="https://twitter.com/musubizm_mai" color="white" />
						<Idol name="Takashima Kaede" group="PassCode" image={ kaede } link="https://twitter.com/PassCode_kaede" color="yellow" />
						<Idol name="Ayuni D" group="BiSH" image={ ayunid } link="https://twitter.com/AYUNiD_BiSH" color="black" />
						<Idol name="Mirei Hoshina" group="Ebichu" image={ mirei } link="http://www.lineblog.me/tag/%E6%98%9F%E5%90%8D%E7%BE%8E%E6%80%9C?blog_name=ebichu" color="pink" />
					</Masonry>
					<hr />
					<Masonry
						className={'idols'}
						options={ masonryOptions }
					>
						<Idol name="Matsushita Reona" group="ManekiKecak" image={ matsushitareona } link="https://twitter.com/matsushitareona" color="red" />
					</Masonry>
				</Box>
				<Box col={4} md={3}>
					<div className="info-area">
						<div className="info">
							<h1>tomOshi</h1>
							<p>On the left you can see my Oshis (the idols I support), clicking on them will take you to their twitter or blog.</p>
							<p>The top list are my kamioshis, then you have general oshis and then some new oshis I'm starting to get into.</p>
							<p><a href="https://twitter.com/tomouchuu/lists/oshis">Full Twitter List</a></p>
							<p>If you have any groups you want to suggest then let me know at <a href="https://twitter.com/tomouchuu" title="@tomouchuu on twitter">@tomouchuu</a>!</p>
						</div>
					</div>
				</Box>
			</Flex>
		);
	}
}

ReactDOM.render(
	<App />,
	document.getElementById('root')
);
