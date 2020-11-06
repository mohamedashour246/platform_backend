	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand wmin-0 mr-5">
			<a href="{{ route('board.index') }}" class="d-inline-block">
				<img src="{{ asset('board_assets/global_assets/images/logo_light.png') }}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-people"></i>
						<span class="d-md-none ml-2">Users</span>
						<span class="badge badge-mark border-orange-400 ml-auto ml-md-0"></span>
					</a>
					
					<div class="dropdown-menu dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Users online</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
										<span class="d-block text-muted font-size-sm">Lead web developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Will Brason</a>
										<span class="d-block text-muted font-size-sm">Marketing manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
										<span class="d-block text-muted font-size-sm">Project manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
										<span class="d-block text-muted font-size-sm">Business developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
										<span class="d-block text-muted font-size-sm">UX expert</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All users</a>
							<a href="#" class="text-grey"><i class="icon-gear"></i></a>
						</div>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-pulse2"></i>
						<span class="d-md-none ml-2">Activity</span>
						<span class="badge badge-mark border-orange-400 ml-auto ml-md-0"></span>
					</a>
					
					<div class="dropdown-menu dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Latest activity</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-success-400 rounded-round btn-icon"><i class="icon-mention"></i></a>
									</div>

									<div class="media-body">
										<a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
										<div class="font-size-sm text-muted mt-1">4 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-pink-400 rounded-round btn-icon"><i class="icon-paperplane"></i></a>
									</div>
									
									<div class="media-body">
										Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
										<div class="font-size-sm text-muted mt-1">36 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-blue rounded-round btn-icon"><i class="icon-plus3"></i></a>
									</div>
									
									<div class="media-body">
										<a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch in <span class="font-weight-semibold">Limitless</span> repository
										<div class="font-size-sm text-muted mt-1">2 hours ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-purple-300 rounded-round btn-icon"><i class="icon-truck"></i></a>
									</div>
									
									<div class="media-body">
										Shipping cost to the Netherlands has been reduced, database updated
										<div class="font-size-sm text-muted mt-1">Feb 8, 11:30</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-warning-400 rounded-round btn-icon"><i class="icon-comment"></i></a>
									</div>
									
									<div class="media-body">
										New review received on <a href="#">Server side integration</a> services
										<div class="font-size-sm text-muted mt-1">Feb 2, 10:20</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-teal-400 rounded-round btn-icon"><i class="icon-spinner11"></i></a>
									</div>
									
									<div class="media-body">
										<strong>January, 2018</strong> - 1320 new users, 3284 orders, $49,390 revenue
										<div class="font-size-sm text-muted mt-1">Feb 1, 05:46</div>
									</div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All activity</a>
							<div>
								<a href="#" class="text-grey" data-popup="tooltip" title="Clear list"><i class="icon-checkmark3"></i></a>
								<a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<span class="badge bg-success-400 badge-pill ml-md-3 mr-md-auto">16 orders</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="../../../../global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
						English
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item english"><img src="../../../../global_assets/images/lang/gb.png" class="img-flag" alt=""> English</a>
						<a href="#" class="dropdown-item ukrainian"><img src="../../../../global_assets/images/lang/ua.png" class="img-flag" alt=""> Українська</a>
						<a href="#" class="dropdown-item deutsch"><img src="../../../../global_assets/images/lang/de.png" class="img-flag" alt=""> Deutsch</a>
						<a href="#" class="dropdown-item espana"><img src="../../../../global_assets/images/lang/es.png" class="img-flag" alt=""> España</a>
						<a href="#" class="dropdown-item russian"><img src="../../../../global_assets/images/lang/ru.png" class="img-flag" alt=""> Русский</a>
					</div>
				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>Victoria</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Secondary navbar -->
	<div class="navbar navbar-expand-md navbar-light">
		<div class="text-center d-md-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
				<i class="icon-unfold mr-2"></i>
				Navigation
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.html" class="navbar-nav-link active">
						<i class="icon-home4 mr-2"></i>
						Dashboard
					</a>
				</li>

				<li class="nav-item nav-item-levels mega-menu-full">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Navigation
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-body">
							<div class="row">
								<div class="col-md-3">
									<div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1">Main</div>
									<div class="dropdown-divider mb-2"></div>
									<div class="dropdown-item-group mb-3 mb-md-0">
										<ul class="list-unstyled">
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-copy"></i> Layouts</a>
												<ul class="list-unstyled">
													<li><a href="../../../../layout_1/RTL/default/full/index.html" class="dropdown-item rounded">Default layout</a></li>
													<li><a href="../../../../layout_2/RTL/default/full/index.html" class="dropdown-item rounded">Layout 2</a></li>
													<li><a href="../../../../layout_3/RTL/default/full/index.html" class="dropdown-item rounded">Layout 3</a></li>
													<li><a href="index.html" class="dropdown-item active rounded">Layout 4</a></li>
													<li><a href="../../../../layout_5/RTL/default/full/index.html" class="dropdown-item rounded">Layout 5</a></li>
													<li>
														<a href="../../../../layout_6/RTL/default/full/index.html" class="dropdown-item disabled rounded">
															Layout 6
															<span class="badge bg-transparent align-self-center ml-auto">Coming soon</span>
														</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-color-sampler"></i> Themes</a>
												<ul class="list-unstyled">
													<li><a href="index.html" class="dropdown-item active rounded">Default</a></li>
													<li><a href="../../../RTL/material/full/index.html" class="dropdown-item rounded">Material</a></li>
													<li><a href="../../../RTL/dark/full/index.html" class="dropdown-item rounded">Dark</a></li>
													<li>
														<a href="../../../RTL/clean/full/index.html" class="dropdown-item disabled rounded">
															Clean
															<span class="badge bg-transparent align-self-center ml-auto">Coming soon</span>
														</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="../../../LTR/default/full/index.html" class="dropdown-item rounded">
													<i class="icon-width"></i>
													LTR version
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-3">
									<div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1">Layout</div>
									<div class="dropdown-divider mb-2"></div>
									<div class="dropdown-item-group mb-3 mb-md-0">
										<ul class="list-unstyled">
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-stack2"></i> Page layouts</a>
												<ul class="list-unstyled">
													<li><a href="layout_navbar_fixed_main.html" class="dropdown-item rounded">Fixed main navbar</a></li>
													<li><a href="layout_navbar_sticky_secondary.html" class="dropdown-item rounded">Sticky secondary navbar</a></li>
													<li><a href="layout_navbar_hideable_main.html" class="dropdown-item rounded">Hideable main navbar</a></li>
													<li><a href="layout_navbar_hideable_secondary.html" class="dropdown-item rounded">Hideable secondary navbar</a></li>
													<li><a href="layout_footer_fixed.html" class="dropdown-item rounded">Fixed footer</a></li>
													<li><a href="layout_footer_hideable.html" class="dropdown-item rounded">Hideable footer</a></li>
													<li><a href="layout_without_header.html" class="dropdown-item rounded">Without page header</a></li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-page-break2"></i> Headers &amp; footers</a>
												<ul class="list-unstyled">
													<li><a href="content_page_header.html" class="dropdown-item rounded">Page header</a></li>
													<li>
														<a href="content_page_footer.html" class="dropdown-item rounded disabled">
															Page footer
															<span class="badge bg-transparent align-self-center ml-auto">Coming soon</span>
														</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-cube3"></i> Boxed layout</a>
												<ul class="list-unstyled">
													<li><a href="layout_boxed_default.html" class="dropdown-item rounded">Boxed with default sidebar</a></li>
													<li><a href="layout_boxed_mini.html" class="dropdown-item rounded">Boxed with mini sidebar</a></li>
													<li><a href="layout_boxed_full.html" class="dropdown-item rounded">Boxed full width</a></li>
													<li><a href="layout_boxed_content.html" class="dropdown-item rounded">Boxed content</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-3">
									<div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1">Navigation</div>
									<div class="dropdown-divider mb-2"></div>
									<div class="dropdown-item-group mb-3 mb-md-0">
										<ul class="list-unstyled">
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-menu3"></i> Navbars</a>
												<ul class="list-unstyled">
													<li>
														<a href="#" class="dropdown-item rounded">Single navbar</a>
														<ul class="list-unstyled">
															<li><a href="navbar_single_top_static.html" class="dropdown-item rounded">Single top static</a></li>
															<li><a href="navbar_single_top_fixed.html" class="dropdown-item rounded">Single top fixed</a></li>
															<li><a href="navbar_single_bottom_static.html" class="dropdown-item rounded">Single bottom static</a></li>
															<li><a href="navbar_single_bottom_fixed.html" class="dropdown-item rounded">Single bottom fixed</a></li>
														</ul>
													</li>
													<li>
														<a href="#" class="dropdown-item rounded">Multiple navbars</a>
														<ul class="list-unstyled">
															<li><a href="navbar_multiple_top_static.html" class="dropdown-item rounded">Multiple top static</a></li>
															<li><a href="navbar_multiple_top_fixed.html" class="dropdown-item rounded">Multiple top fixed</a></li>
															<li><a href="navbar_multiple_bottom_static.html" class="dropdown-item rounded">Multiple bottom static</a></li>
															<li><a href="navbar_multiple_bottom_fixed.html" class="dropdown-item rounded">Multiple bottom fixed</a></li>
															<li><a href="navbar_multiple_top_bottom.html" class="dropdown-item rounded">Multiple - top and bottom</a></li>
															<li><a href="navbar_multiple_secondary_sticky.html" class="dropdown-item rounded">Multiple - secondary sticky</a></li>
														</ul>
													</li>
													<li>
														<a href="#" class="dropdown-item rounded">Content navbar</a>
														<ul class="list-unstyled">
															<li><a href="navbar_component_single.html" class="dropdown-item rounded">Single navbar</a></li>
															<li><a href="navbar_component_multiple.html" class="dropdown-item rounded">Multiple navbars</a></li>
														</ul>
													</li>
													<li class="dropdown-divider"></li>
													<li><a href="navbar_colors.html" class="dropdown-item rounded">Color options</a></li>
													<li><a href="navbar_sizes.html" class="dropdown-item rounded">Sizing options</a></li>
													<li><a href="navbar_hideable.html" class="dropdown-item rounded">Hide on scroll</a></li>
													<li><a href="navbar_components.html" class="dropdown-item rounded">Navbar components</a></li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-transmission"></i> Horizontal navigation</a>
												<ul class="list-unstyled">
													<li><a href="navigation_horizontal_click.html" class="dropdown-item rounded">Submenu on click</a></li>
													<li><a href="navigation_horizontal_hover.html" class="dropdown-item rounded">Submenu on hover</a></li>
													<li><a href="navigation_horizontal_elements.html" class="dropdown-item rounded">With custom elements</a></li>
													<li><a href="navigation_horizontal_tabs.html" class="dropdown-item rounded">Tabbed navigation</a></li>
													<li><a href="navigation_horizontal_disabled.html" class="dropdown-item rounded">Disabled navigation links</a></li>
													<li><a href="navigation_horizontal_mega.html" class="dropdown-item rounded">Horizontal mega menu</a></li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-tree5"></i> Menu levels</a>
												<ul class="list-unstyled">
													<li><a href="#" class="dropdown-item rounded"><i class="icon-IE"></i> Second level</a></li>
													<li>
														<a href="#" class="dropdown-item rounded"><i class="icon-firefox"></i> Second level with child</a>
														<ul class="list-unstyled">
															<li><a href="#" class="dropdown-item rounded"><i class="icon-android"></i> Third level</a></li>
															<li>
																<a href="#" class="dropdown-item rounded"><i class="icon-apple2"></i> Third level with child</a>
																<ul class="list-unstyled">
																	<li><a href="#" class="dropdown-item rounded"><i class="icon-html5"></i> Fourth level</a></li>
																	<li><a href="#" class="dropdown-item rounded"><i class="icon-css3"></i> Fourth level</a></li>
																</ul>
															</li>
															<li><a href="#" class="dropdown-item rounded"><i class="icon-windows"></i> Third level</a></li>
														</ul>
													</li>
													<li><a href="#" class="dropdown-item rounded"><i class="icon-chrome"></i> Second level</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-3">
									<div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1">Extras</div>
									<div class="dropdown-divider mb-2"></div>
									<div class="dropdown-item-group mb-3 mb-md-0">
										<ul class="list-unstyled">
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-indent-decrease2"></i> Sidebars</a>
												<ul class="list-unstyled">
													<li>
														<a href="#" class="dropdown-item rounded">Main sidebar</a>
														<ul class="list-unstyled">
															<li><a href="sidebar_default_collapse.html" class="dropdown-item rounded">Default collapsible</a></li>
															<li><a href="sidebar_default_hide.html" class="dropdown-item rounded">Default hideable</a></li>
															<li><a href="sidebar_default_hidden.html" class="dropdown-item rounded">Default hidden</a></li>
															<li><a href="sidebar_mini_collapse.html" class="dropdown-item rounded">Mini collapsible</a></li>
															<li><a href="sidebar_mini_hide.html" class="dropdown-item rounded">Mini hideable</a></li>
															<li><a href="sidebar_mini_hidden.html" class="dropdown-item rounded">Mini hidden</a></li>
															<li class="dropdown-divider"></li>
															<li><a href="sidebar_default_sections.html" class="dropdown-item rounded">Sectioned sidebar</a></li>
															<li><a href="sidebar_default_stretched.html" class="dropdown-item rounded">Stretched sidebar</a></li>
															<li><a href="sidebar_default_color_dark.html" class="dropdown-item rounded">Dark color</a></li>
															<li><a href="sidebar_default_color_custom.html" class="dropdown-item rounded">Custom color</a></li>
															<li><a href="sidebar_default_color_sections_custom.html" class="dropdown-item rounded">Custom sections color</a></li>
														</ul>
													</li>
													<li>
														<a href="#" class="dropdown-item rounded">Secondary sidebar</a>
														<ul class="list-unstyled">
															<li><a href="sidebar_secondary_after.html" class="dropdown-item rounded">After default</a></li>
															<li><a href="sidebar_secondary_before.html" class="dropdown-item rounded">Before default</a></li>
															<li><a href="sidebar_secondary_hidden.html" class="dropdown-item rounded">Hidden by default</a></li>
															<li class="dropdown-divider"></li>
															<li><a href="sidebar_secondary_sections.html" class="dropdown-item rounded">Sectioned sidebar</a></li>
															<li><a href="sidebar_secondary_stretched.html" class="dropdown-item rounded">Stretched sidebar</a></li>
															<li><a href="sidebar_secondary_color_dark.html" class="dropdown-item rounded">Dark color</a></li>
															<li><a href="sidebar_secondary_color_custom.html" class="dropdown-item rounded">Custom color</a></li>
															<li><a href="sidebar_secondary_color_sections_custom.html" class="dropdown-item rounded">Custom sections color</a></li>
														</ul>
													</li>
													<li>
														<a href="#" class="dropdown-item rounded">Right sidebar</a>
														<ul class="list-unstyled">
															<li><a href="sidebar_right_default_collapse.html" class="dropdown-item rounded">Show - collapse main</a></li>
															<li><a href="sidebar_right_default_hide.html" class="dropdown-item rounded">Show - hide main</a></li>
															<li><a href="sidebar_right_default_toggle.html" class="dropdown-item rounded">Show - fix default width</a></li>
															<li><a href="sidebar_right_mini_toggle.html" class="dropdown-item rounded">Show - fix mini width</a></li>
															<li><a href="sidebar_right_secondary_hide.html" class="dropdown-item rounded">Show - hide secondary</a></li>
															<li><a href="sidebar_right_visible.html" class="dropdown-item rounded">Visible by default</a></li>
															<li class="dropdown-divider"></li>
															<li><a href="sidebar_right_sections.html" class="dropdown-item rounded">Sectioned sidebar</a></li>
															<li><a href="sidebar_right_stretched.html" class="dropdown-item rounded">Stretched sidebar</a></li>
															<li><a href="sidebar_right_color_dark.html" class="dropdown-item rounded">Dark color</a></li>
															<li><a href="sidebar_right_color_custom.html" class="dropdown-item rounded">Custom color</a></li>
															<li><a href="sidebar_right_color_sections_custom.html" class="dropdown-item rounded">Custom sections color</a></li>
														</ul>
													</li>
													<li class="dropdown-divider"></li>
													<li><a href="sidebar_components.html" class="dropdown-item rounded">Sidebar components</a></li>
												</ul>
											</li>
											<li>
												<a href="#" class="dropdown-item rounded"><i class="icon-sort"></i> Vertical navigation</a>
												<ul class="list-unstyled">
													<li><a href="navigation_vertical_collapsible.html" class="dropdown-item rounded">Collapsible menu</a></li>
													<li><a href="navigation_vertical_accordion.html" class="dropdown-item rounded">Accordion menu</a></li>
													<li><a href="navigation_vertical_bordered.html" class="dropdown-item rounded">Bordered navigation</a></li>
													<li><a href="navigation_vertical_right_icons.html" class="dropdown-item rounded">Right icons</a></li>
													<li><a href="navigation_vertical_badges.html" class="dropdown-item rounded">Badges</a></li>
													<li><a href="navigation_vertical_disabled.html" class="dropdown-item rounded">Disabled items</a></li>
												</ul>
											</li>
											<li>
												<a href="navigation_horizontal_mega.html" class="dropdown-item font-weight-semibold rounded">
													<i class="icon-grid52 text-indigo-400"></i>
													<span class="text-indigo-400">Mega menu component</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy mr-2"></i>
						Starter kit
					</a>

					<div class="dropdown-menu">
						<div class="dropdown-header">Basic layouts</div>
						<div class="dropdown-submenu">
							<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-grid2"></i> Sidebars</a>
							<div class="dropdown-menu">
								<a href="../seed/sidebar_none.html" class="dropdown-item">No sidebar</a>
								<a href="../seed/sidebar_main.html" class="dropdown-item">1 sidebar</a>
								<div class="dropdown-submenu">
									<a href="#" class="dropdown-item dropdown-toggle">2 sidebars</a>
									<div class="dropdown-menu">
										<a href="../seed/sidebar_secondary.html" class="dropdown-item">Secondary sidebar</a>
										<a href="../seed/sidebar_right.html" class="dropdown-item">Right sidebar</a>
									</div>
								</div>
								<div class="dropdown-submenu">
									<a href="#" class="dropdown-item dropdown-toggle">3 sidebars</a>
									<div class="dropdown-menu">
										<a href="../seed/sidebar_right_hidden.html" class="dropdown-item">Right sidebar hidden</a>
										<a href="../seed/sidebar_right_visible.html" class="dropdown-item">Right sidebar visible</a>
									</div>
								</div>
								<a href="../seed/sidebar_sections.html" class="dropdown-item">Sectioned sidebar</a>
								<a href="../seed/sidebar_stretched.html" class="dropdown-item">Stretched sidebar</a>
							</div>
						</div>
						<div class="dropdown-submenu">
							<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-paragraph-justify3"></i> Navbars</a>
							<div class="dropdown-menu">
								<a href="../seed/navbar_main_fixed.html" class="dropdown-item">Main navbar fixed</a>
								<a href="../seed/navbar_main_hideable.html" class="dropdown-item">Main navbar hideable</a>
								<a href="../seed/navbar_secondary_sticky.html" class="dropdown-item">Secondary navbar sticky</a>
								<a href="../seed/navbar_both_fixed.html" class="dropdown-item">Both navbars fixed</a>
							</div>
						</div>
						<div class="dropdown-header">Optional layouts</div>
						<a href="../seed/layout_boxed.html" class="dropdown-item"><i class="icon-align-center-horizontal"></i> Boxed layout</a>
					</div>
				</li>
			</ul>

			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Connect
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-body p-2">
							<div class="row no-gutters">
								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-github4 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Github</div>
									</a>

									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-dropbox text-blue-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Dropbox</div>
									</a>
								</div>
								
								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-dribbble3 text-pink-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Dribbble</div>
									</a>

									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-google-drive text-success-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Drive</div>
									</a>
								</div>

								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-twitter text-info-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Twitter</div>
									</a>

									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-youtube text-danger icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Youtube</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="d-md-none ml-2">Settings</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
						<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
						<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /secondary navbar -->