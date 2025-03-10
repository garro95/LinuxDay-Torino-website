<?php
# Linux Day 2016 - Construct a database chapter
# Copyright (C) 2016, 2017, 2018 Valerio Bozzolan, Linux Day Torino
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

trait ChapterTrait {

	/**
	 * Get chapter ID
	 *
	 * @return int
	 */
	public function getChapterID() {
		return $this->nonnull( Chapter::ID );
	}

	/**
	 * Get chapter UID
	 *
	 * @return string
	 */
	public function getChapterUID() {
		return $this->get( Chapter::UID );
	}

	/**
	 * Get localized chapter name
	 *
	 * @return string
	 */
	function getChapterName() {
		return __( $this->get( Chapter::NAME ) );
	}

	/**
	 * Normalize a Chapter object
	 */
	protected function normalizeChapter() {
		$this->integers( Chapter::ID );
	}
}

class Chapter extends Queried {
	use ChapterTrait;

	/**
	 * Database table name
	 */
	const T = 'chapter';

	/**
	 * Chapter ID column
	 */
	const ID = 'chapter_ID';

	/**
	 * Chapter UID column
	 */
	const UID = 'chapter_uid';

	/**
	 * Chapter NAME column
	 */
	const NAME = 'chapter_name';

	/**
	 * Complete Chapter ID column
	 */
	const ID_ = self::T . DOT . self::ID;

	/**
	 * Maximum UID length
	 *
	 * @override
	 */
	const MAXLEN_UID = 32;

	function __construct() {
		$this->normalizeChapter();
	}
}
