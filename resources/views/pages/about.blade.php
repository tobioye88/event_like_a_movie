<x-layout-app title="About ELM">
	<!-- Hero  -->
	<section
		style="background-image: url('{{ asset('assets/images/about-img.jpg') }}'); background-size: cover; background-position: center;"
		class="flex h-120 flex-col items-center justify-center bg-purple-500">
		<h6 class="font-brygada mb-4 text-xs tracking-[3px] text-white uppercase md:text-sm">
			Know more
		</h6>

		<h1 class="font-brygada text-[40px] font-medium text-white capitalize md:text-[56px] lg:text-[88px] text-shadow-sm">
			About us
		</h1>
	</section>

	<section class="pt-12">
		<div class="wrapper-container mb-8">
			<div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
				<div>
					<h6 class="text-highlight font-brygada text-xs font-medium tracking-[3px] uppercase md:text-sm lg:text-base">
						best in the game
					</h6>

					<h2
						class="font-brygada py-8 text-3xl font-medium tracking-[3px] text-black md:text-3xl md:text-[36px] lg:w-[10ch] lg:text-4xl lg:text-[48px]">
						livestream with heart
					</h2>

					<div class="border-darkGray/20 mb-8 max-w-full border-t"></div>

					<div>
						<div class="mb-4">
							<svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
								fill="none">
								<path
									d="M5.56401 24C3.79239 24 2.4083 23.391 1.41176 22.173C0.470588 20.8997 0 19.3218 0 17.4394C0 15.0035 0.359862 12.7889 1.07958 10.7958C1.85467 8.74741 2.87889 6.83737 4.15225 5.06574C5.42561 3.29412 6.86505 1.60554 8.47059 0L10.7128 1.91003C8.88581 3.84775 7.36332 5.86851 6.14533 7.97232C4.9827 10.0761 4.3737 12.0138 4.31834 13.7855C4.59516 13.7301 4.81661 13.7024 4.9827 13.7024C5.14879 13.7024 5.34256 13.7024 5.56401 13.7024C7.00346 13.7024 8.22145 14.2007 9.21799 15.1972C10.2145 16.1938 10.7128 17.4118 10.7128 18.8512C10.7128 20.2353 10.2145 21.4533 9.21799 22.5052C8.22145 23.5017 7.00346 24 5.56401 24ZM18.8512 24C17.0796 24 15.6955 23.391 14.699 22.173C13.7578 20.8997 13.2872 19.3218 13.2872 17.4394C13.2872 15.0035 13.6471 12.7889 14.3668 10.7958C15.1419 8.74741 16.1661 6.83737 17.4394 5.06574C18.7128 3.29412 20.1522 1.60554 21.7578 0L24 1.91003C22.173 3.84775 20.6505 5.86851 19.4325 7.97232C18.2699 10.0761 17.6609 12.0138 17.6055 13.7855C17.8824 13.7301 18.1038 13.7024 18.2699 13.7024C18.4914 13.7024 18.6851 13.7024 18.8512 13.7024C20.2907 13.7024 21.5086 14.2007 22.5052 15.1972C23.5017 16.1938 24 17.4118 24 18.8512C24 20.2353 23.5017 21.4533 22.5052 22.5052C21.564 23.5017 20.346 24 18.8512 24Z"
									fill="#205B4F"></path>
							</svg>

							<p class="w-full text-sm text-black md:text-base">
								ELM is the best I have experienced in past few months.
								They know Live Stream very well.
							</p>
							</svg>
						</div>

						<div class="flex items-center gap-4 text-black">
							<img src="{{  asset('assets/images/testimonial.jpg') }}" alt="testimonial image" width="32" height="32"
								class="rounded-full" />

							<div>
								<p class="text-sm font-medium tracking-[3px] uppercase">
									Brendan eddie
								</p>
								<p class="text-darkGray text-sm capitalize">
									Lagos, Nigeria
								</p>
							</div>
						</div>
					</div>
				</div>
				<img src="{{ asset('assets/images/camera.png') }}" width="320" height="480" alt="camera image"
					class="w-full md:max-w-125 block" />

				<div class="text-darkGray flex w-full flex-col gap-3 lg:max-w-100">
					<div class="border-darkGray/20 mb-4 border-t w-7.5"></div>
					<p>
						Event like a Movie” is a revolutionary media company that
						focuses on creating an amazing and exhilarating event streaming
						experience like never before.
					</p>
					<p>
						We make your online event curation and delivery beautiful and
						seamless by providing high definition, real time feeds of your
						event to your online audience.
					</p>
					<p>
						We engage your audience in fun activities during the Event; we
						also enable them to participate in the event in various exciting
						ways!
					</p>
					<p>
						We have so much in store; we can’t wait for you to experience
						us!
					</p>
				</div>
			</div>
			<hr class="border-darkGray/20 my-16 max-w-full border-t" />
		</div>
	</section>


	<section>
		<div class="wrapper-container py-8">
			<div class="mb-16 grid grid-cols-1 gap-8 text-black max-md:text-center md:grid-cols-3">
				<div class="flex flex-col gap-4">
					<svg aria-hidden="true" class="fill-highlight h-6 w-6 max-md:mx-auto" viewBox="0 0 640 512"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z">
						</path>
					</svg>

					<h4 class="font-brygada text-xl font-medium md:text-2xl">
						Consult
					</h4>

					<p class="text-darkGray text-sm md:text-base">
						Our goal is to understand your unique event requirements, to
						provide bespoke wireless live stream services for you and your
						guests.
					</p>
				</div>

				<div class="flex flex-col gap-4">
					<svg aria-hidden="true" class="fill-highlight h-6 w-6 max-md:mx-auto" viewBox="0 0 576 512"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M384 64H192C86 64 0 150 0 256s86 192 192 192h192c106 0 192-86 192-192S490 64 384 64zm0 320c-70.8 0-128-57.3-128-128 0-70.8 57.3-128 128-128 70.8 0 128 57.3 128 128 0 70.8-57.3 128-128 128z">
						</path>
					</svg>

					<h4 class="font-brygada font-medium md:text-2xl">Activate</h4>

					<p class="text-darkGray text-sm md:text-base">
						We deploy the latest technology to ensure you get value for
						money, and are hands on for a seamless event experience.
					</p>
				</div>

				<div class="flex flex-col gap-4">
					<svg aria-hidden="true" class="fill-highlight h-6 w-6 max-md:mx-auto" viewBox="0 0 512 512"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M16 128h416c8.84 0 16-7.16 16-16V48c0-8.84-7.16-16-16-16H16C7.16 32 0 39.16 0 48v64c0 8.84 7.16 16 16 16zm480 80H80c-8.84 0-16 7.16-16 16v64c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-64c0-8.84-7.16-16-16-16zm-64 176H16c-8.84 0-16 7.16-16 16v64c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-64c0-8.84-7.16-16-16-16z">
						</path>
					</svg>

					<h4 class="font-brygada text-xl font-medium md:text-2xl">
						Stream
					</h4>

					<p class="text-darkGray text-sm md:text-base">
						Your guests will enjoy a premium audio/visual experience,
						watching from any location in the world.
					</p>
				</div>
			</div>

			<div class="mb-16 aspect-video w-full">
				<iframe class="h-full w-full" src="https://www.youtube.com/embed/391DG3ZgTK4" title="YouTube video player"
					frameborder="0" allow="
                accelerometer;
                autoplay;
                clipboard-write;
                encrypted-media;
                gyroscope;
                picture-in-picture;
              " allowfullscreen>
				</iframe>
			</div>

			<div class="grid w-full grid-cols-2 gap-10 md:grid-cols-4">
				<div class="flex flex-col items-center justify-center gap-2">
					<p class="text-3xl font-medium text-[#205b4f] md:text-4xl lg:text-[60px]">
						24
					</p>

					<h6 class="text-darkGray text-xs tracking-[3px] uppercase md:text-sm">
						Experts
					</h6>
				</div>

				<div class="flex flex-col items-center justify-center gap-2">
					<p class="text-3xl font-medium text-[#205b4f] md:text-4xl lg:text-[60px]">
						1,300 +
					</p>

					<h6 class="text-darkGray text-xs tracking-[3px] uppercase md:text-sm">
						Happy viewers
					</h6>
				</div>

				<div class="flex flex-col items-center justify-center gap-2">
					<p class="text-3xl font-medium text-[#205b4f] md:text-4xl lg:text-[60px]">
						50 +
					</p>

					<h6 class="text-darkGray text-xs tracking-[3px] uppercase md:text-sm">
						Clients
					</h6>
				</div>

				<div class="flex flex-col items-center justify-center gap-2">
					<p class="text-3xl font-medium text-[#205b4f] md:text-4xl lg:text-[60px]">
						63
					</p>

					<h6 class="text-darkGray text-xs tracking-[3px] uppercase md:text-sm">
						streams
					</h6>
				</div>
			</div>
		</div>
	</section>
</x-layout-app>